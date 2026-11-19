<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\Tag;
use App\Queries\SubscriptionFilter;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::with('tags')->latest()->paginate(10);
        return view('subscriptions.index', compact('subscriptions'));
    }

    public function admin(Request $request, SubscriptionFilter $filter)
    {
        $input = $request->validate([
            'title'   => ['nullable', 'string', 'max:255'],
            'tagName' => ['nullable', 'string', 'max:100'],
            'tag_id'  => ['nullable', 'integer', 'exists:tags,id'],
            'sort'    => ['nullable', 'string', 'max:30'],
        ]);

        $subscriptions = $filter->apply($input)
            ->paginate(10)
            ->withQueryString();

        return view('subscriptions.admin', [
            'subscriptions' => $subscriptions,
            'tags'          => Tag::orderBy('name')->pluck('name', 'id'),
        ]);
    }

    public function create()
    {
        return view('subscriptions.create', [
            'tags' => Tag::pluck('name', 'id'),
            'selected' => [],
        ]);
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'price'       => ['required', 'numeric', 'min:0'],
            'description' => ['nullable', 'string'],
            'tags'        => ['nullable', 'array'],
            'tags.*'      => ['integer', 'exists:tags,id'],
        ]);
        $subscription = Subscription::create([
            'title'       => $data['title'],
            'price'       => $data['price'],
            'description' => $data['description'] ?? null,
        ]);
        $subscription->tags()->sync($data['tags'] ?? []);
        return redirect()->route('subscriptions.show', $subscription);
    }
    public function show(Subscription $subscription)
    {
        $subscription->load('tags');
        return view('subscriptions.show', compact('subscription'));
    }
    public function edit(Subscription $subscription)
    {
        $subscription->load('tags');
        return view('subscriptions.edit', [
            'subscription' => $subscription,
            'tags'         => Tag::pluck('name', 'id'),
            'selected'     => $subscription->tags->pluck('id')->all(),
        ]);
    }
    public function update(Request $request, Subscription $subscription)
    {
        $data = $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'price'       => ['required', 'numeric', 'min:0'],
            'description' => ['nullable', 'string'],
            'tags'        => ['nullable', 'array'],
            'tags.*'      => ['integer', 'exists:tags,id'],
        ]);
        $subscription->update([
            'title'       => $data['title'],
            'price'       => $data['price'],
            'description' => $data['description'] ?? null,
        ]);
        $subscription->tags()->sync($data['tags'] ?? []);
        return redirect()->route('subscriptions.show', $subscription);
    }
    public function destroy(Subscription $subscription)
    {
        $subscription->delete();
        return redirect()->route('subscriptions.index');
    }
}

<?php

namespace App\Queries;

use App\Models\Subscription;
use Illuminate\Database\Eloquent\Builder;
class SubscriptionFilter
{
    private const SORTABLE = [
        'title'      => 'subscriptions.title',
        'price'      => 'subscriptions.price',
        'tags_count' => 'tags_count',
        'created'    => 'subscriptions.created_at',
    ];
    public function apply(array $input): Builder
    {
        $query = Subscription::query()
            ->with('tags')
            ->withCount('tags');
        //   за назвою
        $query->when(
            $input['title'] ?? null,
            fn (Builder $q, $value) => $q->where(
                'subscriptions.title',
                'like',
                "%{$value}%"
            )
        );
        //  послуги
        $query->when(
            $input['tagName'] ?? null,
            fn (Builder $q, $value) => $q->whereHas(
                'tags',
                fn (Builder $related) => $related->where('tags.name', 'like', "%{$value}%")
            )
        );
        // випадаючий список за послугою
        $query->when(
            $input['tag_id'] ?? null,
            fn (Builder $q, $value) => $q->whereHas(
                'tags',
                fn (Builder $related) => $related->whereKey($value)
            )
        );
        return $this->sort($query, $input['sort'] ?? null);
    }
    private function sort(Builder $query, ?string $sort): Builder
    {
        $desc = str_starts_with($sort ?? '', '-');
        $field = $desc ? substr($sort, 1) : $sort;

        if (!isset(self::SORTABLE[$field])) {
            return $query->orderByDesc('subscriptions.created_at')
                ->orderByDesc('subscriptions.id');
        }

        return $query
            ->orderBy(
                self::SORTABLE[$field],
                $desc ? 'desc' : 'asc'
            )
            ->orderByDesc('subscriptions.id');
    }
}

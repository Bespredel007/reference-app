@extends('layouts.app')
@section('title', 'Головна сторінка')
{{--  Lab 1 --}}
@section('content')
    <div class="content-container">

        <div class="info">
            <div class="image">
                <img src=" https://sportlife.ua/cdn-cgi/image/width=968,format=webp/https://r2.sportlife.ua/083_A7280_Edit_kopiya_9cf742b098.jpg " alt="Тренажерний зал">
            </div>
            <div class="card-text">
                <h2>Тренажерний зал</h2>
                <p>Сучасне обладнання провідних світових брендів. Зони силових тренувань, вільних ваг та нова силова зона для занять будь-якої складності.</p>
            </div>
        </div>

        <!--  (Басейн) -->
        <div class="info reverse">
            <div class="card">
                <img src="https://f.kyivmaps.com/photo/5961/QJhbb.jpg" alt="Басейн та аквазона">
            </div>
            <div class="card-text">
                <h2>Басейн та аквазона</h2>
                <p>Плавання загартовує організм, покращує роботу серця та знімає стрес. Наш 25-метровий басейн обладнаний багаторівневою системою очищення води.</p>
            </div>
        </div>

        <!--  Спортивний бар -->
        <div class="info">
            <div class="card">
                <img src="https://i.pinimg.com/originals/4e/b8/21/4eb8218a7c8d9b93be5d2342a02af566.png" alt="Фітнес-бар та протеїн">
            </div>
            <div class="card-text">
                <h2>Фітнес-бар та протеїн</h2>
                <p>Протеїнові коктейлі допомагають м'язам швидко відновлюватися після навантажень. Великий вибір спортивного харчування та корисних напоїв.</p>
            </div>
        </div>

        <!-- Групові тренування -->
        <div class="info reverse">
            <div class="card">
                <img src="https://sb.energym-sport.com/wp-content/uploads/2022/01/img_3089-scaled.jpg" alt="Групові тренування">
            </div>
            <div class="card-text">
                <h2>Групові тренування</h2>
                <p>Заняття в команді мотивують та заряджають енергією. Зали для пілатесу, йоги, сайклінгу та інтенсивних HIIT-програм.</p>
            </div>
        </div>

        <!-- Масаж -->
        <div class="info">
            <div class="card">
                <img src="https://sportstyle.kh.ua/assets/images/images/massage%20(1).png" alt="Масажний кабінет">
            </div>
            <div class="card-text">
                <h2>Масажний кабінет</h2>
                <p>Спортивний, розслабляючий та відновлювальний масаж. Допомагає зняти м'язову напругу, покращити гнучкість та прискорити регенерацію.</p>
            </div>
        </div>
    </div>
@endsection
{{-- lab1 changes --}}

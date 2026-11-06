<section class="spa-gallery">
    <div class="gallery-heading">
        <span>WELCOME TO LUNA SPA</span>
        <h2>Không Gian Thư Giãn</h2>
        <p>
            Nơi bạn tận hưởng sự thư thái,
            chăm sóc sắc đẹp và tái tạo năng lượng.
        </p>
    </div>

    <div class="gallery-grid">

        <div class="gallery-item item-large">
            <img src="{{ asset('spa-1.jpg') }}" alt="Không gian Luna Spa">
        </div>

        <div class="gallery-item">
            <img src="{{ asset('spa-2.jpg') }}" alt="Phòng spa">
        </div>

        <div class="gallery-item">
            <img src="{{ asset('spa-3.jpg') }}" alt="Chăm sóc da">
        </div>

        <div class="gallery-item">
            <img src="{{ asset('spa-4.jpg') }}" alt="Massage thư giãn">
        </div>

        <div class="gallery-item">
            <img src="{{ asset('spa-5.jpg') }}" alt="Phòng trị liệu">
        </div>

    </div>
</section>

<style>
.spa-gallery {
    padding: 70px 8%;
    background: #faf6ef;
}

.gallery-heading {
    text-align: center;
    margin-bottom: 35px;
}

.gallery-heading span {
    color: #b18a54;
    letter-spacing: 3px;
    font-size: 13px;
}

.gallery-heading h2 {
    color: #55402e;
    font-size: 32px;
    margin: 12px 0;
}

.gallery-heading p {
    color: #777;
    font-size: 15px;
}

.gallery-grid {
    display: grid;
    grid-template-columns: 2fr 1fr 1fr;
    grid-template-rows: 220px 220px;
    gap: 15px;
}

.gallery-item {
    overflow: hidden;
    border-radius: 12px;
}

.gallery-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: 0.4s;
}

.gallery-item:hover img {
    transform: scale(1.06);
}

.item-large {
    grid-row: span 2;
}

@media (max-width: 768px) {
    .gallery-grid {
        grid-template-columns: 1fr 1fr;
        grid-template-rows: 200px 150px 150px;
    }

    .item-large {
        grid-column: span 2;
        grid-row: span 1;
    }
}
</style>
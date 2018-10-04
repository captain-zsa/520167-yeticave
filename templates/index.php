<section class="promo">
    <h2 class="promo__title">Нужен стафф для катки?</h2>
    <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
    <ul class="promo__list">
        <!--заполните этот список из массива категорий-->
        <?php foreach( $category as $key): ?>
            <?php foreach( $key as $value ): ?>
                <li class="promo__item promo__item--boards">
                    <a class="promo__link" href="pages/all-lots.html"><?= esc($value) ?></a>
                </li>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </ul>
</section>
<section class="lots">
    <div class="lots__header">
        <h2>Открытые лоты</h2>
    </div>
    <ul class="lots__list">
        <!--заполните этот список из массива с товарами-->
        <?php foreach( $items as $value ): ?>
            <li class="lots__item lot">
                <div class="lot__image">
                    <img src="<?= esc( $value[ 'lot_img' ] ) ?>" width="350" height="260" alt="<?= esc( $value[ 'name' ] ) ?>">
                </div>
                <div class="lot__info">
                    <span class="lot__category"><?= esc( $value[ 'category' ] ) ?></span>
                    <h3 class="lot__title"><a class="text-link" href="pages/lot.html"><?= esc( $value[ 'name' ] ) ?></a></h3>
                    <div class="lot__state">
                        <div class="lot__rate">
                            <span class="lot__amount">Стартовая цена</span>
                            <span class="lot__cost"><?= getSumResult( esc( $value[ 'initial_price' ] ) ) ?></span>
                        </div>
                        <div class="lot__timer timer">
                            <span><?= esc( $lot_timer ) ?></span>
                        </div>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</section>
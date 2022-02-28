<div class="col-12 col-xl-2 m-auto">
    <form method="post">
        <select id="filter-archive" class="filter-choices" name="filter-items">
            <option class='items' hidden>FILTER</option>
            <option class='items' value="latest">LATEST</option>
            <option class='items' value="popular">POPULAR</option>
        </select>
        <input id="cat" type="hidden" value="<?php $categories = get_the_category(); echo $category_id = $categories[0]->cat_ID; ?>">
    </form>
</div>
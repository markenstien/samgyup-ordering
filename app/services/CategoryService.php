<?php
    namespace Services;
    class CategoryService {
        const ITEM = 'ITEMS';
        const COMMON_TRANSACTIONS = 'COMMON_TRANSACTIONS';

        const BRAND = 'BRAND';
        const MANUFACTURER = 'MANUFACTURER';

        const PRODUCT_CATEGORY = 'PRODUCT_CATEGORY';
        const PRODUCT_PACKAGE_CATEGORY = 'PRODUCT_PACKAGE_CATEGORY';

        public function getCategories() {

            return [
                self::PRODUCT_CATEGORY
            ];
        }

    }
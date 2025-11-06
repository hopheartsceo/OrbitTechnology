<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        $customers = [
            // English Customers
            [
                'locale' => 'en',
                'name' => 'Saudi Aramco',
                'website_url' => 'https://www.aramco.com',
                'description' => 'World\'s leading energy company',
                'is_featured' => true,
                'order' => 1,
                'is_active' => true,
            ],
            [
                'locale' => 'en',
                'name' => 'STC - Saudi Telecom Company',
                'website_url' => 'https://www.stc.com.sa',
                'description' => 'Leading digital enabler in the region',
                'is_featured' => true,
                'order' => 2,
                'is_active' => true,
            ],
            [
                'locale' => 'en',
                'name' => 'Al Rajhi Bank',
                'website_url' => 'https://www.alrajhibank.com.sa',
                'description' => 'One of the largest Islamic banks worldwide',
                'is_featured' => true,
                'order' => 3,
                'is_active' => true,
            ],
            [
                'locale' => 'en',
                'name' => 'SABIC',
                'website_url' => 'https://www.sabic.com',
                'description' => 'Global leader in diversified chemicals',
                'is_featured' => false,
                'order' => 4,
                'is_active' => true,
            ],
            [
                'locale' => 'en',
                'name' => 'Mobily',
                'website_url' => 'https://www.mobily.com.sa',
                'description' => 'Premier telecommunications provider',
                'is_featured' => false,
                'order' => 5,
                'is_active' => true,
            ],
            [
                'locale' => 'en',
                'name' => 'Saudi Airlines',
                'website_url' => 'https://www.saudia.com',
                'description' => 'National flag carrier of Saudi Arabia',
                'is_featured' => false,
                'order' => 6,
                'is_active' => true,
            ],

            // Arabic Customers
            [
                'locale' => 'ar',
                'name' => 'أرامكو السعودية',
                'website_url' => 'https://www.aramco.com',
                'description' => 'الشركة الرائدة في مجال الطاقة عالمياً',
                'is_featured' => true,
                'order' => 1,
                'is_active' => true,
            ],
            [
                'locale' => 'ar',
                'name' => 'STC - الاتصالات السعودية',
                'website_url' => 'https://www.stc.com.sa',
                'description' => 'الممكّن الرقمي الرائد في المنطقة',
                'is_featured' => true,
                'order' => 2,
                'is_active' => true,
            ],
            [
                'locale' => 'ar',
                'name' => 'مصرف الراجحي',
                'website_url' => 'https://www.alrajhibank.com.sa',
                'description' => 'أحد أكبر المصارف الإسلامية في العالم',
                'is_featured' => true,
                'order' => 3,
                'is_active' => true,
            ],
            [
                'locale' => 'ar',
                'name' => 'سابك',
                'website_url' => 'https://www.sabic.com',
                'description' => 'الشركة الرائدة عالمياً في الكيماويات المتنوعة',
                'is_featured' => false,
                'order' => 4,
                'is_active' => true,
            ],
            [
                'locale' => 'ar',
                'name' => 'موبايلي',
                'website_url' => 'https://www.mobily.com.sa',
                'description' => 'مزود الاتصالات الرائد',
                'is_featured' => false,
                'order' => 5,
                'is_active' => true,
            ],
            [
                'locale' => 'ar',
                'name' => 'الخطوط السعودية',
                'website_url' => 'https://www.saudia.com',
                'description' => 'الناقل الوطني للمملكة العربية السعودية',
                'is_featured' => false,
                'order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($customers as $customer) {
            Customer::create($customer);
        }
    }
}

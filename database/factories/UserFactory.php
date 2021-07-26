<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

//INSERT INTO `exam`(`id`, `name`, `cost`, `category`, `description`, `created_at`, `updated_at`, `category_en`) VALUES      (NULL , 'جذب اتمی','cost','شیمی','description','created_at',NULL,'Chemical'),
//            (NULL , 'FT_IR',NULL,'شیمی',NULL,NULL,NULL,'Chemical'),
//            (NULL , 'استفاده ازکوره آزمایشگاهی',NULL,'شیمی',NULL,NULL,NULL,'Chemical'),
//            (NULL , 'NMR',NULL,'شیمی',NULL,NULL,NULL,'Chemical'),
//            (NULL , 'TGA',NULL,'شیمی',NULL,NULL,NULL,'Chemical'),
//            (NULL , 'UV_VIS',NULL,'شیمی',NULL,NULL,NULL,'Chemical'),
//            (NULL , 'مرجع آب و فاضلاب',NULL,'شیمی',NULL,NULL,NULL,'Chemical'),
//            (NULL , 'کروماتوگرافی',NULL,'شیمی',NULL,NULL,NULL,'Chemical'),
//            (NULL , 'استریومیکروسکوپ',NULL,'مکانیک سنگ',NULL,NULL,NULL,'Rock_Mechanics'),
//            (NULL , 'مقاومت بار نقطه ای',NULL,'مکانیک سنگ',NULL,NULL,NULL,'Rock_Mechanics'),
//            (NULL , 'تحکیم با گیج',NULL,'مکانیک سنگ',NULL,NULL,NULL,'Rock_Mechanics'),
//            (NULL , 'دانه بندی',NULL,'مکانیک سنگ',NULL,NULL,NULL,'Rock_Mechanics'),
//            (NULL , 'برش نازک سنگ و کانی',NULL,'مکانیک سنگ',NULL,NULL,NULL,'Rock_Mechanics'),
//            (NULL , 'مطالعه میکروسکوپی سنگ و کانی',NULL,'مکانیک سنگ',NULL,NULL,NULL,'Rock_Mechanics'),
//            (NULL , 'سانتریفیوژ',NULL,'مکانیک سنگ',NULL,NULL,NULL,'Rock_Mechanics'),
//        (NULL , 'استفاده از اتاق رشد',NULL,'کشاورزی',NULL,NULL,NULL,'Agriculture'),
//            (NULL , 'اتوکلاو',NULL,'کشاورزی',NULL,NULL,NULL,'Agriculture'),
//            (NULL , 'سانتریفیوژ',NULL,'کشاورزی',NULL,NULL,NULL,'Agriculture'),
//            (NULL , 'استفاده از PCR',NULL,'کشاورزی',NULL,NULL,NULL,'Agriculture'),
//            (NULL , 'لایه نشانی به روش اسپاترینگ',NULL,'فیزیک',NULL,NULL,NULL,'Physics'),
//            (NULL , 'اندازه گیری جریان-ولتاژ سلول خورشیدی',NULL,'فیزیک',NULL,NULL,NULL,'Physics'),
//            (NULL , 'استفاده از کوره آزمایشگاهی',NULL,'فیزیک',NULL,NULL,NULL,'Physics'),
//            (NULL , 'طیف بینی مرئی و فرابنفش UV-Vis',NULL,'فیزیک',NULL,NULL,NULL,'Physics'),
//            (NULL , 'میکروسکوپ پروبی روبشی SPM-AFM',NULL,'فیزیک',NULL,NULL,NULL,'Physics'),
//            (NULL , 'فوتولومینسانس PL',NULL,'فیزیک',NULL,NULL,NULL,'Physics'),
//            (NULL , 'درخواست دستگاه PVD',NULL,'فیزیک',NULL,NULL,NULL,'Physics'),
//            (NULL , 'XRD',NULL,'مواد متالوژی',NULL,NULL,NULL,'Metallurgy'),
//            (NULL , 'اسپکتروفتومتر',NULL,'مواد متالوژی',NULL,NULL,NULL,'Metallurgy'),
//            (NULL , 'انجام پرس',NULL,'شکل دهی فلزات',NULL,NULL,NULL,'Metal_Shaping'),
//            (NULL , 'تست سایش-دورانی',NULL,'شکل دهی فلزات',NULL,NULL,NULL,'Metal_Shaping'),
//            (NULL , 'تست پیچش',NULL,'شکل دهی فلزات',NULL,NULL,NULL,'Metal_Shaping'),
//            (NULL , 'تست سایش -رفت و برگشتی',NULL,'شکل دهی فلزات',NULL,NULL,NULL,'Metal_Shaping'),
//(NULL , 'کانه آرایی',NULL,'کانه آرایی',NULL,NULL,NULL,'Mineral_Shaping'),
//    (NULL , 'متالوگرافی',NULL,'کانه آرایی',NULL,NULL,NULL,'Mineral_Shaping'),
//     (NULL , 'استفاده از کوره آزمایشگاهی 2',NULL,'مواد پیشرفته',NULL,NULL,NULL,'Pro_Metallurgy'),
//    (NULL , 'استفاده ازآسیاب ماهواره ای',NULL,'مواد پیشرفته',NULL,NULL,NULL,'Pro_Metallurgy'),
//    (NULL , 'استفاده ازدستگاه خزش',NULL,'مواد پیشرفته',NULL,NULL,NULL,'Pro_Metallurgy'),
//    (NULL , 'استفاده از خشک کن و خشک کن خلاء',NULL,'مواد پیشرفته',NULL,NULL,NULL,'Pro_Metallurgy'),
//    (NULL , 'استفاده از دستگاه ضربه',NULL,'مواد پیشرفته',NULL,NULL,NULL,'Pro_Metallurgy'),
//    (NULL , 'استفاده از دستگاه  کشش ، فشار و خمش',NULL,'مواد پیشرفته',NULL,NULL,NULL,'Pro_Metallurgy'),
//    (NULL , 'میکروسختی',NULL,'مواد پیشرفته',NULL,NULL,NULL,'Pro_Metallurgy'),
//    (NULL , 'برآورد منحنی مشخصه رطوبتی خاک',NULL,'مکانیک سیالات و آبیاری',NULL,NULL,NULL,'Irrigation'),
//    (NULL , 'اندازه گیری کیفیت آب',NULL,'مکانیک سیالات و آبیاری',NULL,NULL,NULL,'Irrigation'),
//    (NULL , 'ارزیابی کنتورهای حجمی تحویل آب از نظر درست بودن',NULL,'مکانیک سیالات و آبیاری',NULL,NULL,NULL,'Irrigation'),
//    (NULL , 'ارزیابی فرم درخواست آزمون ارزیابی کنتورهای حجمی تحویل آب از نظر درست بودن',NULL,'مکانیک سیالات و آبیاری',NULL,NULL,NULL,'Irrigation'),
//    (NULL , 'ارزیابی اندازه گیری کیفیت عصاره اشباع خاک',NULL,'مکانیک سیالات و آبیاری',NULL,NULL,NULL,'Irrigation'),
//     (NULL , 'ویسکومتری',NULL,'مکانیک خاک',NULL,NULL,NULL,'Soil_Mechanics'),
//    (NULL , 'دانه بندی',NULL,'مکانیک خاک',NULL,NULL,NULL,'Soil_Mechanics'),
//    (NULL , 'سه محوری سیکلی',NULL,'مکانیک خاک',NULL,NULL,NULL,'Soil_Mechanics'),
//    (NULL , 'هیدرومتری',NULL,'مکانیک خاک',NULL,NULL,NULL,'Soil_Mechanics'),
//    (NULL , 'تک محوری',NULL,'مکانیک خاک',NULL,NULL,NULL,'Soil_Mechanics'),
//    (NULL , 'سه محوری استاتیکی',NULL,'مکانیک خاک',NULL,NULL,NULL,'Soil_Mechanics'),
//    (NULL , 'بندر المنت',NULL,'مکانیک خاک',NULL,NULL,NULL,'Soil_Mechanics'),
//    (NULL , 'کالیبراسیون',NULL,'مکانیک خاک',NULL,NULL,NULL,'Soil_Mechanics'),
//    (NULL , 'حدود اتربرگ',NULL,'مکانیک خاک',NULL,NULL,NULL,'Soil_Mechanics'),
//    (NULL , 'تحکیم',NULL,'مکانیک خاک',NULL,NULL,NULL,'Soil_Mechanics'),
//    (NULL , 'برش پره',NULL,'مکانیک خاک',NULL,NULL,NULL,'Soil_Mechanics'),
//    (NULL , 'CBR',NULL,'مکانیک خاک',NULL,NULL,NULL,'Soil_Mechanics'),
//    (NULL , 'تراکم',NULL,'مکانیک خاک',NULL,NULL,NULL,'Soil_Mechanics'),
//    (NULL , 'تعیین رطوبت خاک',NULL,'مکانیک خاک',NULL,NULL,NULL,'Soil_Mechanics'),
//    (NULL , 'برش مستقیم بزرگ',NULL,'مکانیک خاک',NULL,NULL,NULL,'Soil_Mechanics'),
//    (NULL , 'برش مستقیم کوچک',NULL,'مکانیک خاک',NULL,NULL,NULL,'Soil_Mechanics'),
//    (NULL , 'GS',NULL,'مکانیک خاک',NULL,NULL,NULL,'Soil_Mechanics'),
//    (NULL , 'ارزش ماسه ای( دانسیته در محل)',NULL,'مکانیک خاک',NULL,NULL,NULL,'Soil_Mechanics'),
//    (NULL , 'طبقه بندی خاک',NULL,'مکانیک خاک',NULL,NULL,NULL,'Soil_Mechanics'),
//    (NULL , 'استفاده از آون',NULL,'مکانیک خاک',NULL,NULL,NULL,'Soil_Mechanics'),
//    (NULL , 'CPT',NULL,'مکانیک خاک',NULL,NULL,NULL,'Soil_Mechanics'),
//    (NULL , 'SPT',NULL,'مکانیک خاک',NULL,NULL,NULL,'Soil_Mechanics'),
//    (NULL , 'آزمایش هیدرومتری به تنهایی',NULL,'زمین شناسی',NULL,NULL,NULL,'Geology'),
//    (NULL , 'آزمایش دانه بندی به روش مکانیکی',NULL,'زمین شناسی',NULL,NULL,NULL,'Geology'),
//    (NULL , 'آزمون دانه بندی به روش مکانیکی',NULL,'زمین شناسی',NULL,NULL,NULL,'Geology'),
//    (NULL , 'تهیه برش نازک سنگ اندازه 2646',NULL,'زمین شناسی',NULL,NULL,NULL,'Geology'),
//    (NULL , 'شناسایی برش صیقلی',NULL,'زمین شناسی',NULL,NULL,NULL,'Geology'),
//    (NULL , 'شناسایی پالینومورف',NULL,'زمین شناسی',NULL,NULL,NULL,'Geology'),
//    (NULL , 'شناسایی ریز سنگواره',NULL,'زمین شناسی',NULL,NULL,NULL,'Geology'),
//    (NULL , 'کانی شناسی و سنگ شناسی (1)',NULL,'زمین شناسی',NULL,NULL,NULL,'Geology'),
//    (NULL , 'کانی شناسی و سنگ شناسی (2)',NULL,'زمین شناسی',NULL,NULL,NULL,'Geology');


$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});
// Our new students state
$factory->state(App\User::class, 'students', function (Faker $faker) {
    return [
        'skilllevel' => collect(['beginner', 'intermediate', 'professional'])->random(),
        'teacher' => collect(['Peter', 'Markus', 'Chris'])->random(),
    ];
});

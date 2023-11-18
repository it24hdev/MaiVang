<?php

namespace Database\Seeders;

use App\Admin\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   City::truncate();
        City::create(['id' => '1','name' => 'Thành phố Hà Nội','code' => 'HANOI']);
        City::create(['id' => '2','name' => 'Tỉnh Hà Giang','code' => 'HAGIANG']);
        City::create(['id' => '4','name' => 'Tỉnh Cao Bằng','code' => 'CAOBANG']);
        City::create(['id' => '6','name' => 'Tỉnh Bắc Kạn','code' => 'BACKAN']);
        City::create(['id' => '8','name' => 'Tỉnh Tuyên Quang','code' => 'TUYENQUANG']);
        City::create(['id' => '10','name' => 'Tỉnh Lào Cai','code' => 'LAOCAI']);
        City::create(['id' => '11','name' => 'Tỉnh Điện Biên','code' => 'DIENBIEN']);
        City::create(['id' => '12','name' => 'Tỉnh Lai Châu','code' => 'LAICHAU']);
        City::create(['id' => '14','name' => 'Tỉnh Sơn La','code' => 'SONLA']);
        City::create(['id' => '15','name' => 'Tỉnh Yên Bái','code' => 'YENBAI']);
        City::create(['id' => '17','name' => 'Tỉnh Hoà Bình','code' => 'HOABINH']);
        City::create(['id' => '19','name' => 'Tỉnh Thái Nguyên','code' => 'THAINGUYEN']);
        City::create(['id' => '20','name' => 'Tỉnh Lạng Sơn','code' => 'LANGSON']);
        City::create(['id' => '22','name' => 'Tỉnh Quảng Ninh','code' => 'QUANGNINH']);
        City::create(['id' => '24','name' => 'Tỉnh Bắc Giang','code' => 'BACGIANG']);
        City::create(['id' => '25','name' => 'Tỉnh Phú Thọ','code' => 'PHUTHO']);
        City::create(['id' => '26','name' => 'Tỉnh Vĩnh Phúc','code' => 'VINHPHUC']);
        City::create(['id' => '27','name' => 'Tỉnh Bắc Ninh','code' => 'BACNINH']);
        City::create(['id' => '30','name' => 'Tỉnh Hải Dương','code' => 'HAIDUONG']);
        City::create(['id' => '31','name' => 'Thành phố Hải Phòng','code' => 'HAIPHONG']);
        City::create(['id' => '33','name' => 'Tỉnh Hưng Yên','code' => 'HUNGYEN']);
        City::create(['id' => '34','name' => 'Tỉnh Thái Bình','code' => 'THAIBINH']);
        City::create(['id' => '35','name' => 'Tỉnh Hà Nam','code' => 'HANAM']);
        City::create(['id' => '36','name' => 'Tỉnh Nam Định','code' => 'NAMDINH']);
        City::create(['id' => '37','name' => 'Tỉnh Ninh Bình','code' => 'NINHBINH']);
        City::create(['id' => '38','name' => 'Tỉnh Thanh Hóa','code' => 'THANHHOA']);
        City::create(['id' => '40','name' => 'Tỉnh Nghệ An','code' => 'NGHEAN']);
        City::create(['id' => '42','name' => 'Tỉnh Hà Tĩnh','code' => 'HATINH']);
        City::create(['id' => '44','name' => 'Tỉnh Quảng Bình','code' => 'QUANGBINH']);
        City::create(['id' => '45','name' => 'Tỉnh Quảng Trị','code' => 'QUANGTRI']);
        City::create(['id' => '46','name' => 'Tỉnh Thừa Thiên Huế','code' => 'THUATHIENHUE']);
        City::create(['id' => '48','name' => 'Thành phố Đà Nẵng','code' => 'DANANG']);
        City::create(['id' => '49','name' => 'Tỉnh Quảng Nam','code' => 'QUANGNAM']);
        City::create(['id' => '51','name' => 'Tỉnh Quảng Ngãi','code' => 'QUANGNGAI']);
        City::create(['id' => '52','name' => 'Tỉnh Bình Định','code' => 'BINHDINH']);
        City::create(['id' => '54','name' => 'Tỉnh Phú Yên','code' => 'PHUYEN']);
        City::create(['id' => '56','name' => 'Tỉnh Khánh Hòa','code' => 'KHANHHOA']);
        City::create(['id' => '58','name' => 'Tỉnh Ninh Thuận','code' => 'NINHTHUAN']);
        City::create(['id' => '60','name' => 'Tỉnh Bình Thuận','code' => 'BINHTHUAN']);
        City::create(['id' => '62','name' => 'Tỉnh Kon Tum','code' => 'KONTUM']);
        City::create(['id' => '64','name' => 'Tỉnh Gia Lai','code' => 'GIALAI']);
        City::create(['id' => '66','name' => 'Tỉnh Đắk Lắk','code' => 'DAKLAK']);
        City::create(['id' => '67','name' => 'Tỉnh Đắk Nông','code' => 'DAKNONG']);
        City::create(['id' => '68','name' => 'Tỉnh Lâm Đồng','code' => 'LAMDONG']);
        City::create(['id' => '70','name' => 'Tỉnh Bình Phước','code' => 'BINHPHUOC']);
        City::create(['id' => '72','name' => 'Tỉnh Tây Ninh','code' => 'TAYNINH']);
        City::create(['id' => '74','name' => 'Tỉnh Bình Dương','code' => 'BINHDUONG']);
        City::create(['id' => '75','name' => 'Tỉnh Đồng Nai','code' => 'DONGNAI']);
        City::create(['id' => '77','name' => 'Tỉnh Bà Rịa - Vũng Tàu','code' => 'BARIAVUNGTAU']);
        City::create(['id' => '79','name' => 'Thành phố Hồ Chí Minh','code' => 'HOCHIMINH']);
        City::create(['id' => '80','name' => 'Tỉnh Long An','code' => 'LONGAN']);
        City::create(['id' => '82','name' => 'Tỉnh Tiền Giang','code' => 'TIENGIANG']);
        City::create(['id' => '83','name' => 'Tỉnh Bến Tre','code' => 'BENTRE']);
        City::create(['id' => '84','name' => 'Tỉnh Trà Vinh','code' => 'TRAVINH']);
        City::create(['id' => '86','name' => 'Tỉnh Vĩnh Long','code' => 'VINHLONG']);
        City::create(['id' => '87','name' => 'Tỉnh Đồng Tháp','code' => 'DONGTHAP']);
        City::create(['id' => '89','name' => 'Tỉnh An Giang','code' => 'ANGIANG']);
        City::create(['id' => '91','name' => 'Tỉnh Kiên Giang','code' => 'KIENGIANG']);
        City::create(['id' => '92','name' => 'Thành phố Cần Thơ','code' => 'CANTHO']);
        City::create(['id' => '93','name' => 'Tỉnh Hậu Giang','code' => 'HAUGIANG']);
        City::create(['id' => '94','name' => 'Tỉnh Sóc Trăng','code' => 'SOCTRANG']);
        City::create(['id' => '95','name' => 'Tỉnh Bạc Liêu','code' => 'BACLIEU']);
        City::create(['id' => '96','name' => 'Tỉnh Cà Mau','code' => 'CAMAU']);
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Doa_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_doa()
    {
        // Data doa dalam bentuk array
        $doaList = [
            [
                'title' => 'Doa Keluar Rumah',
                'arab' => 'بِسْمِ اللَّهِ، تَوَكَّلْتُ عَلَى اللَّهِ، وَلَا حَوْلَ وَلَا قُوَّةَ إِلَّا بِاللَّهِ',
                'transliteration' => 'Bismillah, tawakkaltu ‘ala Allah, wala haula wala quwwata illa billah',
                'translation' => 'Dengan nama Allah, aku berserah diri kepada Allah, dan tiada daya serta kekuatan kecuali dengan Allah.',
                'category' => 'Doa Harian',
            ],
            [
                'title' => 'Doa Safar (Bepergian)',
                'arab' => 'سُبْحَانَ الَّذِي سَخَّرَ لَنَا هَذَا وَمَا كُنَّا لَهُ مُقْرِنِينَ',
                'transliteration' => 'Subhanalladzi sakhkhoro lana hadza wama kunna lahu muqrinin',
                'translation' => 'Maha Suci Allah yang telah menundukkan semua ini bagi kami padahal sebelumnya kami tidak mampu menguasainya.',
                'category' => 'Doa Perjalanan',
            ],
            [
                'title' => 'Doa Naik Kendaraan',
                'arab' => 'اللَّهُمَّ إِنَّا نَسْأَلُكَ فِي سَفَرِنَا هَذَا البِرَّ وَالتَّقْوَى',
                'transliteration' => 'Allahumma inna nas’aluka fi safarina hadza albirra wattaqwa',
                'translation' => 'Ya Allah, kami memohon kepada-Mu dalam perjalanan ini kebaikan dan ketakwaan.',
                'category' => 'Doa Perjalanan',
            ],
            [
                'title' => 'Niat Ihram',
                'arab' => 'ﻟَﺒَّﻴْﻚَ اﻟﻠَّـﻬُﻢَّ ﻋُﻤْﺮَﺓ نَوَيْتُ العُمْرَةَ وَأَحْرَمْتُ بِهَا لِلهِ تَعَالَى لَبَّيْكَ اللَّهُمَّ بعُمْرَة',
                'transliteration' => 'Labbaikallahumma Umrah, Nawaitul ‘umrata wa ahramtu bihi lillahi ta’ala',
                'translation' => 'Ya Allah, kupenuhi panggilan-Mu untuk ber-Umrah, Aku niat melaksanakan umrah dan berihram karena Allah Swt.',
                'category' => 'Doa Haji/Umrah',
            ],
            [
                'title' => 'Talbiyah',
                'arab' => 'لَبَّيْكَ اللَّهُمَّ لَبَّيْكَ، لَبَّيْكَ لَا شَرِيكَ لَكَ لَبَّيْكَ، إِنَّ الْحَمْدَ وَالنِّعْمَةَ لَكَ وَالْمُلْكَ، لَا شَرِيكَ لَكَ',
                'transliteration' => 'Labbaikallahumma labbaik, labbaik laa shariika laka labbaik, innal-hamda wan-ni’mata laka wal-mulk, laa sharika lak',
                'translation' => 'Aku datang memenuhi panggilan-Mu ya Allah, aku datang memenuhi panggilan-Mu tidak ada sekutu bagi-Mu, aku datang memenuhi panggilan-Mu. Sesungguhnya segala puji, nikmat dan segenap kekuasaan adalah milik-Mu, tidak ada sekutu bagi-Mu',
                'category' => 'Doa Haji/Umrah',
            ],
            [
                'title' => 'Doa Masuk Masjid',
                'arab' => 'اللّهُـمَّ افْتَـحْ لي أَبْوابَ رَحْمَتـِك',
                'transliteration' => 'Allahumma iftah li abwaba rahmatik',
                'translation' => 'Ya Allah, bukakanlah untukku pintu-pintu rahmat-Mu.',
                'category' => 'Doa Harian',
            ],
            [
                'title' => 'Doa Masuk Kota Mekkah',
                'arab' => "اَﻟﻠّٰﻬُﻢَّ ﻫٰﺬَﺁ/ﺣَﺮَﻣُﻚَ ﻭَﺃَﻣْﻨُﻚَ/ﻓَﺣَﺮِّﻡْ ﻟَﺣْﻤِﻲْ ﻭَﺩَﻣِﻲْ/ﻭَﺷَﻌْﺮِﻱْ ﻭَﺑَﺸَﺮِﻱْ/ﻋَﻠَﻰ اﻟﻨَّﺎﺭِ/ﻭَاٰﻣِﻨِّﻲْ ﻣِﻦْ ﻋَﺬَاﺑِﻚَ/ﻳَﻮْمَ ﺗَﺒْﻌَﺚُ ﻋِﺒَﺎﺩَﻙَ/ﻭَاﺟْﻌَﻠْﻨِﻲْ ﻣِﻦْ ﺃَﻭْﻟِﻴَﺂﺋِﻚَ/ﻭَﺃَﻫْﻞِ ﻃَﺎﻋَﺘِﻚ",
                'transliteration' => "Allaahumma haadzaa haramuka wa amnuka faharrim lahmii wadamii wasya’rii wabasyarii ‘alan naari wa aaminnii min ‘adzaabika yauma tab’atsu ‘ibaadika waj’alnii min auliyaa-ika wa-ahli thaa’atika",
                'translation' => "Ya Allah, kota ini adalah tanah haram-Mu dan tempat aman-Mu, maka hindarkanlah daging, darah, rambut dan kulitku dari neraka. Dan selamatkanlah diriku dari siksa-Mu pada hari Engkau membangkitkan kembali hamba-Mu, dan jadikanlah aku termasuk orang-orang yang selalu dekat dan taat kepada-Mu",
                'category' => 'Doa Haji/Umrah',
            ],
            [
                'title' => 'Doa Melihat Ka\'bah',
                'arab' => "اﻟﻠَّﻬُﻢَّ ﺯِﺩْ ﻫَﺬَا اﻟْﺒَﻴْﺖَ/ ﺗَﺸْﺮِﻳﻔًﺎ ﻭَﺗَﻌْﻈِﻴﻤًﺎ/ ﻭَﺗَﻜْﺮِﻳﻤًﺎ ﻭَﻣَﻬَﺎﺑَﺔً/ ﻭَﺯِﺩْ ﻣَﻦْ ﺷَﺮّﻓَﻪُ ﻭَﻛَﺮّﻣَﻪُ/ ﻣِﻤَّﻦْ ﺣَﺠَّﻪُ اﻭَﻋْﺘَﻤَﺮَﻩُ/ ﺗَﺸْﺮِﻳﻔًﺎ / ﻭَﺗَﻌْﻈِﻴﻤًﺎ / ﻭَﺗَﻜْﺭِﻳﻤًﺎ ﻭَﺑِﺮًّا",
                'transliteration' => "Rabbi Adkhilni mudkhala sidqin waakhrijni mukhraja sidqin waj'alni min ladunka sultannasira waqulja alhaqqu wazahaqqal baatilu innalbatila kana zahuqa",
                'translation' => "Ya Allah, tambahkanlah kemuliaan, keagungan, kehormatan dan wibawa pada Bait (Ka’bah) ini. Dan tambahkanlah pula pada orang-orang yang memuliakan, mengagungkan dan menghormatinya di antara mereka yang ber-Haji atau yang ber-Umroh dengan kemuliaan, keagungan, kehormatan dan kebaikan",
                'category' => 'Doa Haji/Umrah',
            ],
            [
                'title' => 'Doa Ketika Melintasi Maqam Ibrahim',
                'arab' => "ﺭَﺏِّ ﺃَﺩْﺧِﻠْﻨِﻲ/ ﻣُﺪْﺧَﻞَ ﺻِﺪْﻕٍ/ ﻭَﺃَﺧْﺮِﺟْﻨِﻲ/ ﻣُﺨْﺮَﺝَ ﺻِﺪْﻕٍ/ ﻭَاﺟْﻌَﻞْ ﻟِﻲ/ ﻣِﻦْ ﻟَﺪُﻧْﻚَ/ ﺳُﻠْﻄَﺎﻧًﺎ ﻧَﺼِﻴﺮًا/ ﻭَﻗُﻞْ ﺟَﺎءَ اﻟْﺣَﻖُّ/ ﻭَﺯَﻫَﻖَ اﻟْﺒَﺎﻃِﻞُ/ ﺇِﻥَّ اﻟْﺒَﺎﻃِﻞَ// ﻛَﺎﻥَ ﺯَﻫُﻮُﻗًﺎ",
                'transliteration' => "Rabbi Adkhilni mudkhala sidqin waakhrijni mukhraja sidqin waj'alni min ladunka sultannasira waqulja alhaqqu wazahaqqal baatilu innalbatila kana zahuqa",
                'translation' => "Ya Allah, saya mohon kepada-Mu kebaikan negeri ini dan kebaikan penduduknya serta kebaikan yang ada di dalamnya. Saya berlindung kepada-Mu dari kejahatan negeri ini dan kejahatan penduduknya serta kejahatan yang ada di dalamnya",
                'category' => 'Doa Haji/Umrah',
            ],
            [
                'title' => 'Doa Ketika Minum Air Zam Zam',
                'arab' => 'اللّهُـمَّ إِنِّي أَسْأَلُكَ عِلْماً نَافِعاً وَرِزْقاً وَاسِعاً وَشِفَاءً مِنْ كُلِّ دَاءٍ',
                'transliteration' => 'Allahumma inni as’aluka ‘ilman nafi’an wa rizqan wasi’an wa shifa’an min kulli da’in',
                'translation' => 'Ya Allah, aku memohon kepada-Mu ilmu yang bermanfaat, rezeki yang luas, dan kesembuhan dari segala penyakit.',
                'category' => 'Doa Harian',
            ],
            [
                'title' => 'Doa Masuk Kota Madinah',
                'arab' => "َللَّهُمَّ هَذَا حَرَمُ رَسُوْلِكَ فَاجْعَلْهُ وِقَايَةً مِنَ النَّارِ وَاَمَانَةً مِنَ اْلعَذَابِ وَسُوءِ اْلحِسَابِ",
                'transliteration' => "Allaahumma haadzaa haramu rasuulika faj’alhu wiqaayatan minan naari wa amaanatan minal ‘adzaabi wasuu’il hisaabi",
                'translation' => "Ya Allah, negeri ini adalah tanah haram Rasul-Mu Muhammad SAW, maka jadikanlah penjaga bagiku dari neraka, aman dari siksa dan buruknya hisab (perhitungan di hari kemudian)",
                'category' => 'Doa Haji/Umrah',
            ],
            [
                'title' => 'Doa Ketika Ziarah (Salam) kepada Rasulullah, Abu Bakar, dan Umar',
                'arab' => 'السَّلامُ عَلَيْكَ يَا رَسُولَ اللَّهِ، السَّلامُ عَلَيْكَ يَا أَبَا بَكْرٍ، السَّلامُ عَلَيْكَ يَا عُمَرُ',
                'transliteration' => 'Assalamu ‘alaika ya Rasulullah, assalamu ‘alaika ya Aba Bakr, assalamu ‘alaika ya Umar',
                'translation' => 'Salam sejahtera atasmu, wahai Rasulullah, salam sejahtera atasmu, wahai Abu Bakar, salam sejahtera atasmu, wahai Umar.',
                'category' => 'Doa Ziarah',
            ],
            [
                'title' => 'Doa Dunia Akhirat',
                'arab' => 'رَبَّنَا آتِنَا فِي الدُّنْيَا حَسَنَةً وَفِي الآخِرَةِ حَسَنَةً وَقِنَا عَذَابَ النَّارِ',
                'transliteration' => 'Rabbana atina fid-dunya hasanatan wa fil-akhirati hasanatan wa qina ‘adhaban-nar',
                'translation' => 'Ya Tuhan kami, berilah kami kebaikan di dunia dan kebaikan di akhirat dan peliharalah kami dari siksa neraka.',
                'category' => 'Doa Harian',
            ],
            [
                'title' => 'Doa Ziarah ke Makam Baqi/Jabal Uhud',
                'arab' => "السّلاَمُ عَلَيْكُم دَارَ قَومٍ مُؤْمِنِيْنَ ، وَإِنَّا إِنْ شَاءَ اللهُ بِكُم لاَحِقُونَ",
                'transliteration' => 'Assalamu ‘alaikum dara qawmin mu’minin, wa inna insya allaahu bikum lahiquun',
                'translation' => "Salam sejahtera keatas kamu wahai tempat tinggal orang-orang yang beriman, sesungguhnya kami akan mengikuti kamu",
                'category' => 'Doa Ziarah',
            ],
        ];

        return $doaList; // Mengembalikan data doa
    }
}

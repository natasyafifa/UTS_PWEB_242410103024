<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // contoh data artis + albums + tracks berada di controller
    private function artistData()
    {
        return [
            'name' => 'NIKI',
            'bio' => 'NIKI Zefanya adalah penyanyi dan penulis lagu asal Jakarta yang kini berkarier internasional bersama 88rising. Dikenal lewat lagu seperti Lose dan High School in Jakarta, NIKI memadukan nuansa pop dan R&B dengan lirik yang personal dan penuh emosi.',
            'photos' => [
                'https://i.pinimg.com/736x/a6/69/15/a6691589eb5808c47037fbc1c802efab.jpg',
                'https://i.pinimg.com/1200x/96/26/be/9626be1b644701525923adcbc505b573.jpg',
                'https://i.pinimg.com/1200x/bb/19/1d/bb191da125dd7fbc4b2722898d2c1457.jpg',
            ],
            'discography' => [ // ringkasan
                ['id' => 1, 'title' => 'Buzz', 'year' => 2024, 'cover'=> 'https://i.pinimg.com/736x/c2/fd/27/c2fd27bb35d501dcc82dc01853d00728.jpg'],
                ['id' => 2, 'title' => 'Nicole', 'year' => 2022, 'cover'=> 'https://i.pinimg.com/1200x/f0/dd/3f/f0dd3f02cc12b0aef4df014190cae09d.jpg'],
                ['id' => 3, 'title' => 'Moonchild', 'year' => 2020, 'cover'=> 'https://i.pinimg.com/1200x/4c/f8/f0/4cf8f0ae833d2fb2a6fcee697412e952.jpg'],
                ['id' => 4, 'title' => 'Zephyr', 'year' => 2018, 'cover'=> 'https://i.pinimg.com/1200x/72/9d/ba/729dba3f606142c544db4c746123680d.jpg'],

            ],
            'albums' => [
                1 => [
                    'id' => 1,
                    'title' => 'Buzz',
                    'cover' => 'https://i.pinimg.com/736x/c2/fd/27/c2fd27bb35d501dcc82dc01853d00728.jpg',
                    'description' => 'Album Buzz memiliki makna tema sentral tentang Quarter Life Crisis dan perasaan "berada di mana saja sekaligus tidak di mana-mana". Secara umum, album ini mengeksplorasi perasaan gembira dan gugup di awal hubungan baru, serta berbagai emosi lain seperti harapan, kekecewaan, dan penyesalan. ',
                    'tracks' => [
                        ['title' => 'Buzz', 'meaning' => 'Menggambarkan perasaan gembira dan gugup di awal hubungan baru dengan seseorang.'],
                        ['title' => 'Too Much of A Good Thing', 'meaning' => 'Menceritakan tentang hasrat, imajinasi, dan kesenangan yang mengiringi perasaan suka yang mendalam.'],
                        ['title' => 'Colosal Loss', 'meaning' => 'Kekuatan yang ditemukan di dalam diri setelah mengalami pengkhianatan.'],
                        ['title' => 'Focus', 'meaning' => 'Perasaan frustrasi dan lelah karena jatuh cinta dengan seseorang yang tidak pernah bisa benar-benar berkomitmen atau memberikan perhatian penuh.'],
                        ['title' => 'Did You Like Her In The Morning?', 'meaning' => 'Perasaan cemburu, rasa tidak aman, dan kerinduan yang muncul akibat bayang-bayang hubungan masa lalu pasangan.'],
                        ['title' => 'Take Care', 'meaning' => 'Hubungan yang berakhir dengan damai dan penuh penerimaan.'],
                        ['title' => 'Magnets', 'meaning' => 'Obsesi cinta yang kuat pada seseorang, yang membuat NIKI selalu ingin berada di dekat orang yang dicintainya.'],
                        ['title' => 'Tsunami', 'meaning' => 'Menggambarkan emosi yang campur aduk, antara euforia karena cinta baru dan ketakutan akan kehancuran yang bisa ditimbulkannya.'],
                        ['title' => 'Blue Moon', 'meaning' => 'Melambangkan hubungan yang langka, istimewa, tetapi berakhir terlalu cepat, seperti "orang yang tepat di waktu yang salah".'],
                        ['title' => 'Strong Girl', 'meaning' => 'Membahas tentang memutus siklus trauma antargenerasi dan menemukan kekuatan di dalam diri sendiri.'],
                        ['title' => 'Paths', 'meaning' => 'Mengajarkan banyak hal satu sama lain dan bahkan membayangkan masa depan, namun akhirnya harus berpisah.'],
                        ['title' => 'Heirloom Pain', 'meaning' => 'Menggambarkan rasa sakit dan kesulitan yang dirasakan sebagai bagian dari warisan keluarga yang tidak diminta, namun tetap di    bawa seiring berjalannya waktu.'],
                        ['title' => 'Nothing Can', 'meaning' => 'Membiarkan diri merasa tidak memiliki kendali dan menerima ketidaksempurnaan.']
                    ],
                    'links' => [
                        'merch' => 'https://shopau.niki.store/',
                        'spotify' => 'https://open.spotify.com/album/3g73KFee4dbxDq5vTmX92S?si=njnv_fwpSFeyUDWe5ulXZQ',
                        'youtube' => 'https://youtube.com/playlist?list=OLAK5uy_n7se7Oe7Kk5MhxBn74jWTg4jNFOfsFKos&si=GnilBRT72boV8i99',
                    ],
                ],
                2 => [
                    'id' => 2,
                    'title' => 'Nicole',
                    'cover' => 'https://i.pinimg.com/1200x/f0/dd/3f/f0dd3f02cc12b0aef4df014190cae09d.jpg',
                    'description' => 'Refleksi diri NIKI terhadap pengalaman cinta pertamanya dan masa-masa remaja di sekolah menengah, khususnya di Jakarta',
                    'tracks' => [
                        ['title' => 'Before', 'meaning' => 'Menggambarkan perpisahan yang datang terlalu cepat dan kerinduan pada masa sebelum semuanya berubah.'],
                        ['title' => 'High School in Jakarta', 'meaning' => 'Mengisahkan nostalgia dan romansa masa remaja di Jakarta, dengan segala kepolosan dan kekacauannya.'],
                        ['title' => 'Backburner', 'meaning' => 'Menceritakan hubungan yang tak pernah benar-benar berakhir'],
                        ['title' => 'Keeping Tabs', 'meaning' => 'Rasa ingin tahu yang tersisa setelah hubungan berakhir.'],
                        ['title' => 'The Apartment We Wont Share ', 'meaning' => 'Sebuah kisah tentang rencana dan impian bersama yang tak pernah terwujud.'],
                        ['title' => 'Facebook Friends', 'meaning' => 'Menceritakan hubungan yang telah berakhir tapi masih terikat di dunia maya.'],
                        ['title' => 'Anaheim', 'meaning' => 'Tentang kenangan yang indah namun hanya bisa disimpan dalam ingatan.'],
                        ['title' => 'Milk Teeth', 'meaning' => 'Melambangkan hilangnya kepolosan dan tumbuhnya kedewasaan.'],
                        ['title' => 'Autumn', 'meaning' => 'Menggambarkan keindahan dalam melepaskan sesuatu yang telah berlalu.'],
                        ['title' => 'Ocean & Engines', 'meaning' => 'Tentang cinta yang harus dilepaskan meski masih terasa begitu dalam.'],
                        ['title' => 'On The Drive Home', 'meaning' => 'Momen reflektif saat mencoba menerima perpisahan dengan tenang.'],
                        ['title' => 'Take A Chance With Me', 'meaning' => 'Tentang keberanian untuk mencintai lagi setelah terluka.'],
                    ],
                    'links' => [
                        'merch' => 'https://shop.example.com/dawn-echoes-vinyl',
                        'spotify' => 'https://open.spotify.com/album/0TMmGHybMKtsjBBEmwXHkF?si=j_6WY89TR6ieuXWnKeM3fg',
                        'youtube' => 'https://www.youtube.com/watch?v=cWRncduPSxo&list=PLwQBUd8MkxXu4Q0NWxhq7cS7NPYMYjgco',
                    ],
                ],
                3 => [
                    'id' => 3,
                    'title' => 'Moonchild',
                    'cover' => 'https://i.pinimg.com/1200x/4c/f8/f0/4cf8f0ae833d2fb2a6fcee697412e952.jpg',
                    'description' => 'Refleksi diri NIKI terhadap pengalaman cinta pertamanya dan masa-masa remaja di sekolah menengah, khususnya di Jakarta',
                    'tracks' => [
                        ['title' => 'Before', 'meaning' => 'Menggambarkan perpisahan yang datang terlalu cepat dan kerinduan pada masa sebelum semuanya berubah.'],
                        ['title' => 'High School in Jakarta', 'meaning' => 'Mengisahkan nostalgia dan romansa masa remaja di Jakarta, dengan segala kepolosan dan kekacauannya.'],
                        ['title' => 'Backburner', 'meaning' => 'Menceritakan hubungan yang tak pernah benar-benar berakhir'],
                        ['title' => 'Keeping Tabs', 'meaning' => 'Rasa ingin tahu yang tersisa setelah hubungan berakhir.'],
                        ['title' => 'The Apartment We Wont Share ', 'meaning' => 'Sebuah kisah tentang rencana dan impian bersama yang tak pernah terwujud.'],
                        ['title' => 'Facebook Friends', 'meaning' => 'Menceritakan hubungan yang telah berakhir tapi masih terikat di dunia maya.'],
                        ['title' => 'Anaheim', 'meaning' => 'Tentang kenangan yang indah namun hanya bisa disimpan dalam ingatan.'],
                        ['title' => 'Milk Teeth', 'meaning' => 'Melambangkan hilangnya kepolosan dan tumbuhnya kedewasaan.'],
                        ['title' => 'Autumn', 'meaning' => 'Menggambarkan keindahan dalam melepaskan sesuatu yang telah berlalu.'],
                        ['title' => 'Ocean & Engines', 'meaning' => 'Tentang cinta yang harus dilepaskan meski masih terasa begitu dalam.'],
                        ['title' => 'On The Drive Home', 'meaning' => 'Momen reflektif saat mencoba menerima perpisahan dengan tenang.'],
                        ['title' => 'Take A Chance With Me', 'meaning' => 'Tentang keberanian untuk mencintai lagi setelah terluka.'],
                    ],
                    'links' => [
                        'merch' => 'https://shop.example.com/dawn-echoes-vinyl',
                        'spotify' => 'https://open.spotify.com/album/0TMmGHybMKtsjBBEmwXHkF?si=j_6WY89TR6ieuXWnKeM3fg',
                        'youtube' => 'https://www.youtube.com/watch?v=cWRncduPSxo&list=PLwQBUd8MkxXu4Q0NWxhq7cS7NPYMYjgco',
                    ],
                ],
                4 => [
                    'id' => 4,
                    'title' => 'Nicole',
                    'cover' => 'https://i.pinimg.com/1200x/f0/dd/3f/f0dd3f02cc12b0aef4df014190cae09d.jpg',
                    'description' => 'Refleksi diri NIKI terhadap pengalaman cinta pertamanya dan masa-masa remaja di sekolah menengah, khususnya di Jakarta',
                    'tracks' => [
                        ['title' => 'Before', 'meaning' => 'Menggambarkan perpisahan yang datang terlalu cepat dan kerinduan pada masa sebelum semuanya berubah.'],
                        ['title' => 'High School in Jakarta', 'meaning' => 'Mengisahkan nostalgia dan romansa masa remaja di Jakarta, dengan segala kepolosan dan kekacauannya.'],
                        ['title' => 'Backburner', 'meaning' => 'Menceritakan hubungan yang tak pernah benar-benar berakhir'],
                        ['title' => 'Keeping Tabs', 'meaning' => 'Rasa ingin tahu yang tersisa setelah hubungan berakhir.'],
                        ['title' => 'The Apartment We Wont Share ', 'meaning' => 'Sebuah kisah tentang rencana dan impian bersama yang tak pernah terwujud.'],
                        ['title' => 'Facebook Friends', 'meaning' => 'Menceritakan hubungan yang telah berakhir tapi masih terikat di dunia maya.'],
                        ['title' => 'Anaheim', 'meaning' => 'Tentang kenangan yang indah namun hanya bisa disimpan dalam ingatan.'],
                        ['title' => 'Milk Teeth', 'meaning' => 'Melambangkan hilangnya kepolosan dan tumbuhnya kedewasaan.'],
                        ['title' => 'Autumn', 'meaning' => 'Menggambarkan keindahan dalam melepaskan sesuatu yang telah berlalu.'],
                        ['title' => 'Ocean & Engines', 'meaning' => 'Tentang cinta yang harus dilepaskan meski masih terasa begitu dalam.'],
                        ['title' => 'On The Drive Home', 'meaning' => 'Momen reflektif saat mencoba menerima perpisahan dengan tenang.'],
                        ['title' => 'Take A Chance With Me', 'meaning' => 'Tentang keberanian untuk mencintai lagi setelah terluka.'],
                    ],
                    'links' => [
                        'merch' => 'https://shop.example.com/dawn-echoes-vinyl',
                        'spotify' => 'https://open.spotify.com/album/0TMmGHybMKtsjBBEmwXHkF?si=j_6WY89TR6ieuXWnKeM3fg',
                        'youtube' => 'https://www.youtube.com/watch?v=cWRncduPSxo&list=PLwQBUd8MkxXu4Q0NWxhq7cS7NPYMYjgco',
                    ],
                    ],
                ]
            ];
    }

    public function login(Request $request)
    {
        // jika sudah login (session) redirect ke dashboard
        if ($request->session()->has('username')) {
            return redirect()->route('dashboard', ['username' => $request->session()->get('username')]);
        }
        return view('login');
    }

    public function handleLogin(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $username = $request->input('username');

        // disini tidak ada autentikasi nyata — cukup simpan ke session & redirect
        $request->session()->put('username', $username);

        // redirect ke dashboard membawa query param username
        return redirect()->route('dashboard', ['username' => $username]);
    }

    public function dashboard(Request $request)
    {
        $username = $request->query('username') ?? $request->session()->get('username');
        $artist = $this->artistData();

        return view('dashboard', compact('username','artist'));
    }

    public function album(Request $request, $id)
    {
        $username = $request->query('username') ?? $request->session()->get('username');
        $artist = $this->artistData();

        $albums = $artist['albums'];
        if (!isset($albums[$id])) {
            abort(404, 'Album tidak ditemukan');
        }

        $album = $albums[$id];

        return view('album', compact('username','album','artist'));
    }

    public function pengelolaan(Request $request)
    {
        $username = $request->query('username') ?? $request->session()->get('username');
        $artist = $this->artistData();

        // daftar semua possible items (album + tracks) untuk dipilih
        $items = [];
        foreach ($artist['albums'] as $a) {
            $items[] = ['type'=>'album','id'=>$a['id'],'label'=>'Album: '.$a['title']];
            foreach ($a['tracks'] as $t) {
                $items[] = ['type'=>'track','id'=>md5($a['id'] . $t['title']),'label'=>'Track: '.$t['title'].' ('.$a['title'].')'];
            }
        }

        // handle POST favorite submission
        if ($request->isMethod('post')) {
            $favorites = $request->input('favorites', []); // array of labels/ids
            // simpan ke session
            $request->session()->put('favorites', $favorites);
            return redirect()->route('pengelolaan', ['username' => $username]);
        }

        // ambil favorites dari session (jika ada)
        $favorites = $request->session()->get('favorites', []);

        return view('pengelolaan', compact('username','items','favorites'));
    }

    public function profile(Request $request)
    {
        $username = $request->query('username') ?? $request->session()->get('username');
        $artist = $this->artistData();

        return view('profile', compact('username','artist'));
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login.form');
    }
}

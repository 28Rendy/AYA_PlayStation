<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateKontenFasilitasTable extends Migration
{
    public function up()
    {
        Schema::create('konten_fasilitas', function (Blueprint $table) {
            $table->id();
            $table->string('label_badge')->default('Layanan Kami'); // contoh: "Exclusive Room"
            $table->string('judul')->default('Judul Fasilitas');
            $table->text('deskripsi')->nullable();
            $table->string('foto')->nullable(); // path file upload
            $table->string('alt_foto')->nullable();
            $table->integer('urutan')->default(0);
            $table->boolean('aktif')->default(true);
            $table->timestamps();
        });

        // Seed data awal berdasarkan konten yang sudah ada di view
        $items = [
            [
                'label_badge' => 'Exclusive Room',
                'judul' => 'Ruang VIP Gaming Sanctuary',
                'deskripsi' => 'Nikmati sesi mabar privat dengan sofa recliner mewah, Smart TV 4K 65 inci, tata cahaya neon ambient, dan tata suara soundbar imersif untuk kenyamanan maksimal bersama kawan terdekat.',
                'foto' => null,
                'alt_foto' => 'Ruang VIP Gaming Lounge',
                'urutan' => 1,
                'aktif' => 1,
            ],
            [
                'label_badge' => 'Food & Beverage',
                'judul' => 'Arcade & Chill Snack Bar',
                'deskripsi' => 'Tersedia aneka minuman dingin segar, kopi pilihan, mie instan hangat, dan beragam camilan lezat yang siap diantar langsung ke meja Anda tanpa mengganggu jalannya permainan.',
                'foto' => null,
                'alt_foto' => 'Arcade & Snack Bar',
                'urutan' => 2,
                'aktif' => 1,
            ],
            [
                'label_badge' => 'Community & Esports',
                'judul' => 'Turnamen & Komunitas Gamers',
                'deskripsi' => 'Wadah kompetisi berkala untuk game-game kompetitif seperti eFootball, EA Sports FC, Tekken, dan Mortal Kombat dengan hadiah menarik dan atmosfer seru bersama komunitas lokal.',
                'foto' => null,
                'alt_foto' => 'Esports Tournament',
                'urutan' => 3,
                'aktif' => 1,
            ],
            [
                'label_badge' => 'Home Delivery',
                'judul' => 'Paket Rental Konsol Rumahan',
                'deskripsi' => 'Ingin main di rumah bareng keluarga? Kami menyediakan sewa unit PS4 & PS5 harian lengkap dengan tas koper protektif, 2 stik wireless, dan bundle game favorit siap main.',
                'foto' => null,
                'alt_foto' => 'Home Rental Package',
                'urutan' => 4,
                'aktif' => 1,
            ],
            [
                'label_badge' => 'Kenyamanan',
                'judul' => 'Ruangan Bermain Nyaman & Bersih',
                'deskripsi' => 'Setiap ruangan dirancang khusus agar Anda dapat fokus menikmati permainan favorit tanpa gangguan. Tersedia pilihan kapasitas 1 hingga 3 pemain, full AC, dan koneksi internet stabil.',
                'foto' => null,
                'alt_foto' => 'Ruangan Reguler AC',
                'urutan' => 5,
                'aktif' => 1,
            ],
            [
                'label_badge' => 'Ibadah',
                'judul' => 'Mushola Bersih & Tempat Wudhu',
                'deskripsi' => 'Ibadah tetap terjaga saat asyik bermain bersama kawan-kawan. Kami menyediakan mushola yang bersih, tenang, dan terawat dilengkapi dengan sarana wudhu yang memadai.',
                'foto' => null,
                'alt_foto' => 'Mushola',
                'urutan' => 6,
                'aktif' => 1,
            ],
            [
                'label_badge' => 'Area Merokok',
                'judul' => 'Area Merokok Terpisah',
                'deskripsi' => 'Area santai khusus merokok dengan sirkulasi udara terbuka yang baik, sehingga ruangan reguler tetap bebas asap dan nyaman bagi semua pengunjung.',
                'foto' => null,
                'alt_foto' => 'Smoking Area',
                'urutan' => 7,
                'aktif' => 1,
            ],
        ];

        foreach ($items as $item) {
            $item['created_at'] = now();
            $item['updated_at'] = now();
            DB::table('konten_fasilitas')->insert($item);
        }
    }

    public function down()
    {
        Schema::dropIfExists('konten_fasilitas');
    }
}

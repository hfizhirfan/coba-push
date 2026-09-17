<?php
/**
 * Template Name: Contact
 * Description: Halaman kontak MBS CCTV
 *
 * @package MBSCCTV
 */

get_header();
?>

<!-- Hero Banner -->
<section class="relative py-14 lg:py-20 overflow-hidden">
    <div class="absolute inset-0">
        <img src="https://mbs.growandbless.com/wp-content/uploads/2026/03/1987.jpg" alt="" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-slate-900/85"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="mb-6 text-sm text-slate-400">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-white transition-colors">Beranda</a>
            <span class="material-symbols-outlined text-xs align-middle mx-1">chevron_right</span>
            <span class="text-white font-semibold">Kontak</span>
        </nav>
        <h1 class="text-3xl lg:text-4xl font-black text-white mb-3">Hubungi Kami</h1>
        <p class="text-slate-300 max-w-2xl leading-relaxed">Tim ahli kami siap membantu merancang sistem keamanan terbaik sesuai kebutuhan Anda.</p>
    </div>
</section>

<!-- Contact Cards -->
<section class="py-12 lg:py-16 bg-background-light dark:bg-background-dark">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6 -mt-24 relative z-10">
            <!-- Phone -->
            <div class="bg-white dark:bg-slate-800 rounded-lg p-6 border border-slate-200 dark:border-slate-700 shadow-lg text-center">
                <div class="size-14 bg-primary/10 rounded-lg flex items-center justify-center mx-auto mb-4">
                    <span class="material-symbols-outlined text-2xl text-primary">call</span>
                </div>
                <h3 class="font-bold mb-1">Telepon</h3>
                <p class="text-sm text-slate-500 mb-3">Senin - Jumat, 08:00 - 17:00</p>
                <a href="tel:+62315914700" class="text-sm font-bold text-primary hover:underline">(031) 591-4700</a>
                <br>
                <a href="tel:+62315939337" class="text-sm font-bold text-primary hover:underline">(031) 593-9337</a>
            </div>

            <!-- WhatsApp -->
            <div class="bg-white dark:bg-slate-800 rounded-lg p-6 border border-slate-200 dark:border-slate-700 shadow-lg text-center">
                <div class="size-14 bg-primary/10 rounded-lg flex items-center justify-center mx-auto mb-4">
                    <span class="material-symbols-outlined text-2xl text-primary">chat</span>
                </div>
                <h3 class="font-bold mb-1">WhatsApp</h3>
                <p class="text-sm text-slate-500 mb-3">Respon cepat, 24 jam</p>
                <a href="https://wa.me/62816532727" target="_blank" rel="noopener" class="text-sm font-bold text-primary hover:underline">+62 816 532 727</a>
            </div>

            <!-- Email -->
            <div class="bg-white dark:bg-slate-800 rounded-lg p-6 border border-slate-200 dark:border-slate-700 shadow-lg text-center">
                <div class="size-14 bg-primary/10 rounded-lg flex items-center justify-center mx-auto mb-4">
                    <span class="material-symbols-outlined text-2xl text-primary">mail</span>
                </div>
                <h3 class="font-bold mb-1">Email</h3>
                <p class="text-sm text-slate-500 mb-3">Kirim penawaran / inquiry</p>
                <a href="mailto:marketing@mbscctv.com" class="text-sm font-bold text-primary hover:underline">marketing@mbscctv.com</a>
            </div>

            <!-- Address -->
            <div class="bg-white dark:bg-slate-800 rounded-lg p-6 border border-slate-200 dark:border-slate-700 shadow-lg text-center">
                <div class="size-14 bg-primary/10 rounded-lg flex items-center justify-center mx-auto mb-4">
                    <span class="material-symbols-outlined text-2xl text-primary">location_on</span>
                </div>
                <h3 class="font-bold mb-1">Kantor</h3>
                <p class="text-sm text-slate-500 mb-3">Kunjungi showroom kami</p>
                <p class="text-sm font-bold">Jl. Dharmahusada Utara No 22, Surabaya</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form + Map -->
<section class="py-12 lg:py-16 bg-background-light dark:bg-background-dark">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-slate-800 rounded-lg overflow-hidden shadow-xl border border-slate-200 dark:border-slate-700 flex flex-col lg:flex-row">
            <!-- Form -->
            <div class="lg:w-1/2 p-8 lg:p-12">
                <h2 class="text-2xl font-black mb-2">Kirim Pesan</h2>
                <p class="text-slate-500 text-sm mb-8">Isi form di bawah ini dan tim kami akan segera menghubungi Anda.</p>

                <form class="space-y-5" action="#" method="post">
                    <div class="grid sm:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-bold mb-1.5">Nama Lengkap <span class="text-primary">*</span></label>
                            <input type="text" name="name" required
                                   class="w-full bg-background-light dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-md px-4 py-2.5 text-sm focus:border-primary focus:ring-1 focus:ring-primary transition-colors"
                                   placeholder="Nama Anda">
                        </div>
                        <div>
                            <label class="block text-sm font-bold mb-1.5">Perusahaan</label>
                            <input type="text" name="company"
                                   class="w-full bg-background-light dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-md px-4 py-2.5 text-sm focus:border-primary focus:ring-1 focus:ring-primary transition-colors"
                                   placeholder="Nama Perusahaan">
                        </div>
                    </div>
                    <div class="grid sm:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-bold mb-1.5">Email <span class="text-primary">*</span></label>
                            <input type="email" name="email" required
                                   class="w-full bg-background-light dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-md px-4 py-2.5 text-sm focus:border-primary focus:ring-1 focus:ring-primary transition-colors"
                                   placeholder="email@perusahaan.com">
                        </div>
                        <div>
                            <label class="block text-sm font-bold mb-1.5">No. Telepon <span class="text-primary">*</span></label>
                            <input type="tel" name="phone" required
                                   class="w-full bg-background-light dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-md px-4 py-2.5 text-sm focus:border-primary focus:ring-1 focus:ring-primary transition-colors"
                                   placeholder="08xxxxxxxxxx">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-bold mb-1.5">Kebutuhan</label>
                        <select name="subject"
                                class="w-full bg-background-light dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-md px-4 py-2.5 text-sm focus:border-primary focus:ring-1 focus:ring-primary transition-colors">
                            <option value="">Pilih kebutuhan Anda</option>
                            <option value="cctv">CCTV & IP Camera</option>
                            <option value="access-control">Access Control</option>
                            <option value="fire-alarm">Fire Alarm</option>
                            <option value="intrusion-alarm">Intrusion Alarm</option>
                            <option value="public-address">Public Address</option>
                            <option value="video-door-phone">Video Door Phone</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-bold mb-1.5">Pesan <span class="text-primary">*</span></label>
                        <textarea name="message" rows="4" required
                                  class="w-full bg-background-light dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-md px-4 py-2.5 text-sm focus:border-primary focus:ring-1 focus:ring-primary transition-colors"
                                  placeholder="Jelaskan kebutuhan sistem keamanan Anda..."></textarea>
                    </div>
                    <button type="submit"
                            class="w-full bg-primary text-white py-3 rounded-md font-bold text-sm hover:bg-primary/90 transition-all flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined text-lg">send</span>
                        Kirim Pesan
                    </button>
                </form>
            </div>

            <!-- Map -->
            <div class="lg:w-1/2 min-h-[400px]">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.781200612782!2d112.76943357499972!3d-7.265722992741164!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fa282c837087%3A0xef2f914c1ef183b4!2sPT.%20MEDIA%20BERSAMA%20SUKSES!5e0!3m2!1sen!2sid!4v1773633965137!5m2!1sen!2sid"
                        class="w-full h-full min-h-[400px]"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        title="Lokasi PT. Media Bersama Sukses">
                </iframe>
            </div>
        </div>
    </div>
</section>

<!-- Social & Working Hours -->
<section class="py-12 lg:py-16 bg-white dark:bg-slate-900/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 gap-8">
            <!-- Working Hours -->
            <div class="bg-background-light dark:bg-slate-800 rounded-lg p-8 border border-slate-200 dark:border-slate-700">
                <h3 class="text-lg font-black mb-6 flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary">schedule</span>
                    Jam Operasional
                </h3>
                <div class="space-y-3">
                    <div class="flex justify-between items-center py-2 border-b border-slate-200 dark:border-slate-700">
                        <span class="font-semibold text-sm">Senin - Jumat</span>
                        <span class="text-sm text-slate-500">08:00 - 17:00 WIB</span>
                    </div>
                    <div class="flex justify-between items-center py-2 border-b border-slate-200 dark:border-slate-700">
                        <span class="font-semibold text-sm">Sabtu</span>
                        <span class="text-sm text-slate-500">08:00 - 13:00 WIB</span>
                    </div>
                    <div class="flex justify-between items-center py-2">
                        <span class="font-semibold text-sm">Minggu & Hari Libur</span>
                        <span class="text-sm text-primary font-bold">Tutup</span>
                    </div>
                </div>
                <p class="mt-4 text-xs text-slate-400">* WhatsApp support tersedia 24 jam untuk keadaan darurat.</p>
            </div>

            <!-- Social Media -->
            <div class="bg-background-light dark:bg-slate-800 rounded-lg p-8 border border-slate-200 dark:border-slate-700">
                <h3 class="text-lg font-black mb-6 flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary">share</span>
                    Media Sosial
                </h3>
                <div class="space-y-4">
                    <a href="https://www.facebook.com/mbscctv" target="_blank" rel="noopener"
                       class="flex items-center gap-4 p-3 rounded-lg hover:bg-white dark:hover:bg-slate-700 transition-colors">
                        <div class="size-10 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center">
                            <span class="material-symbols-outlined text-blue-600">share</span>
                        </div>
                        <div>
                            <p class="font-bold text-sm">Facebook</p>
                            <p class="text-xs text-slate-400">@mbscctv</p>
                        </div>
                        <span class="material-symbols-outlined text-slate-300 ml-auto">open_in_new</span>
                    </a>
                    <a href="https://www.instagram.com/mbs_securitysystem" target="_blank" rel="noopener"
                       class="flex items-center gap-4 p-3 rounded-lg hover:bg-white dark:hover:bg-slate-700 transition-colors">
                        <div class="size-10 bg-pink-100 dark:bg-pink-900/30 rounded-lg flex items-center justify-center">
                            <span class="material-symbols-outlined text-pink-600">photo_camera</span>
                        </div>
                        <div>
                            <p class="font-bold text-sm">Instagram</p>
                            <p class="text-xs text-slate-400">@mbs_securitysystem</p>
                        </div>
                        <span class="material-symbols-outlined text-slate-300 ml-auto">open_in_new</span>
                    </a>
                    <a href="https://www.linkedin.com/company/pt-media-bersama-sukses" target="_blank" rel="noopener"
                       class="flex items-center gap-4 p-3 rounded-lg hover:bg-white dark:hover:bg-slate-700 transition-colors">
                        <div class="size-10 bg-sky-100 dark:bg-sky-900/30 rounded-lg flex items-center justify-center">
                            <span class="material-symbols-outlined text-sky-600">public</span>
                        </div>
                        <div>
                            <p class="font-bold text-sm">LinkedIn</p>
                            <p class="text-xs text-slate-400">PT. Media Bersama Sukses</p>
                        </div>
                        <span class="material-symbols-outlined text-slate-300 ml-auto">open_in_new</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();

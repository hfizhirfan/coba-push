<?php
/**
 * Terms & Conditions Section - Brows by Veron
 */
$terms_defaults = array(
    1 => array( '1. Booking & Down Payment (DP)', 'Appointment hanya dapat dikonfirmasi setelah pembayaran DP diterima. <strong>No DP = No Booking Confirmation</strong>.' ),
    2 => array( '2. Keterlambatan', 'Batas toleransi keterlambatan maksimal <strong>15 menit</strong> dari waktu yang telah dijadwalkan. Keterlambatan lebih dari 15 menit akan otomatis dijadwalkan ulang (<em>reschedule</em>).' ),
    3 => array( '3. Kebijakan Reschedule', 'Reschedule diperbolehkan maksimal <strong>2 kali</strong>. Lebih dari 2 kali reschedule, DP dinyatakan hangus dan diperlukan DP baru untuk booking ulang.' ),
    4 => array( '4. Riwayat Treatment Sebelumnya', 'Client yang pernah melakukan sulam alis atau sulam bibir sebelumnya wajib mengirimkan foto kondisi terkini tanpa makeup untuk evaluasi terlebih dahulu.' ),
    5 => array( '5. Kondisi Kehamilan & Menyusui', 'Client dalam kondisi hamil atau menyusui diwajibkan untuk konfirmasi dan konsultasi terlebih dahulu sebelum melakukan treatment.' ),
    6 => array( '6. Riwayat Kesehatan', 'Client dengan riwayat penyakit tertentu wajib konsultasi terlebih dahulu melalui admin demi keamanan dan kenyamanan treatment.' ),
    7 => array( '7. Pendampingan Selama Treatment', 'Demi kenyamanan dan kebersihan area kerja privat, client tidak diperkenankan membawa anak kecil maupun teman saat treatment berlangsung.' ),
    8 => array( '8. Usia Minimum', 'Minimal usia <strong>18 tahun</strong> atau dengan persetujuan tertulis orang tua.' ),
    9 => array( '9. Pre & Aftercare Procedure', 'Client wajib mengikuti prosedur sebelum dan sesudah treatment sesuai arahan untuk memastikan hasil optimal dan proses healing yang baik.' ),
    10 => array( '10. Retouch Policy', 'Client akan mendapatkan <strong>FREE retouch 1x dalam jangka waktu 1-2 bulan</strong> setelah treatment pertama. Retouch tahunan yang dilakukan sebelum 2 tahun berhak mendapatkan diskon 50% dari harga normal.' ),
    11 => array( '11. Refund Policy', 'DP tidak dapat dikembalikan (<em>non-refundable</em>). Pembatalan H-1 atau di hari yang sama menyebabkan DP hangus.' ),
    12 => array( '12. Patch Test & Allergic Reaction', 'Disarankan melakukan patch test minimal 24 jam sebelum treatment (jika diperlukan). Reaksi alergi di luar kendali teknisi bukan tanggung jawab pihak BROWSBYVERON.' ),
);
?>
<section id="terms" class="py-20 bg-white relative">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Heading -->
        <div class="text-center max-w-3xl mx-auto mb-16 bbz-reveal">
            <span class="text-xs uppercase tracking-[0.25em] text-bv-brown font-bold block mb-2">
                POLICY &amp; GUIDELINES
            </span>
            <h2 class="font-serif text-4xl sm:text-5xl text-bv-ink font-bold">
                TERM &amp; CONDITIONS
            </h2>
            <p class="font-sans text-base text-bv-muted mt-3">
                Harap membaca ketentuan berikut demi kenyamanan dan keamanan prosedur treatment Anda di Brows by Veron.
            </p>
        </div>

        <!-- 12 Terms Accordion -->
        <div class="space-y-3 bbz-reveal">
            <?php for ( $i = 1; $i <= 12; $i++ ) : 
                $title = get_option( "bv_term_{$i}_title", $terms_defaults[$i][0] );
                $desc  = get_option( "bv_term_{$i}_desc", $terms_defaults[$i][1] );
                $is_first = ( 1 === $i );
            ?>
            <div class="bv-term-item <?php echo $is_first ? 'is-active' : ''; ?>">
                <button type="button" class="bv-term-trigger" aria-expanded="<?php echo $is_first ? 'true' : 'false'; ?>">
                    <span><?php echo esc_html( $title ); ?></span>
                    <span class="bv-term-icon"><i class="fa-solid fa-chevron-down text-xs"></i></span>
                </button>
                <div class="bv-term-content font-sans text-sm text-bv-muted leading-relaxed">
                    <?php echo wp_kses_post( $desc ); ?>
                </div>
            </div>
            <?php endfor; ?>
        </div>

    </div>

    <!-- FAQPage Schema for Google Rich Results -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "FAQPage",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "Bagaimana sistem Booking & Down Payment (DP) di Brows by Veron?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Appointment hanya dapat dikonfirmasi setelah pembayaran DP diterima. No DP = No Booking Confirmation."
          }
        },
        {
          "@type": "Question",
          "name": "Berapa batas toleransi keterlambatan?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Batas toleransi keterlambatan maksimal 15 menit dari waktu yang telah dijadwalkan. Keterlambatan lebih dari 15 menit otomatis dijadwalkan ulang (reschedule)."
          }
        },
        {
          "@type": "Question",
          "name": "Bagaimana kebijakan Reschedule di Brows by Veron?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Reschedule diperbolehkan maksimal 2 kali. Lebih dari 2 kali reschedule, DP dinyatakan hangus dan diperlukan DP baru untuk booking ulang."
          }
        },
        {
          "@type": "Question",
          "name": "Bagaimana kebijakan Retouch sulam di Brows by Veron?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Client akan mendapatkan FREE retouch 1x dalam jangka waktu 1-2 bulan setelah treatment pertama. Retouch tahunan yang dilakukan sebelum 2 tahun berhak mendapatkan diskon 50% dari harga normal."
          }
        }
      ]
    }
    </script>
</section>

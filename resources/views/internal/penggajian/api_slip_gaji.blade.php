<html>
  <head>
    <title></title>
    <style>
      body{
        font-family: 'arial';
        margin-left: 50px;
        margin-right: 50px;
      }

      table{
        font-size: 5;
      }

      .rincian{
        border-spacing: 0;
      }

      hr{
        border: 0;
        border-top:1px dashed #000;
        text-align: center;
      }

      hr:after{
        display: inline-block;
        position: relative;
        background: #fff;
        color: #000;
        font-size: 18px;
      }

      .tabel-1{
        float:left;
        padding-left: 50px;
      }

      .tabel-2{
        float:right;
        padding-right:50px;
      }

      .header{

      }

      .header p{
        font-size: 8px;
      }

      .logo{
          width: auto;
      }

      .logo p{
        float: left;
        margin-left: 50px;
      }

      .nama_perusahaan{
          width: auto;
      }

      .nama_perusahaan h6{
        text-align: center;
        padding-right: 125px;
      }

      .karyawan{

      }

      .rinci{
        margin-top: 60px;
      }

      .terbilang{

      }

      .tanda-tangan{
        margin-top: 15px;
        margin-left: 15px;
      }

      .penerima{
        margin-top: 15px;
        margin-right: 15px;
      }

      .catatan{
        margin-top: 120px;
      }

      .divider{
        margin-top: 150px;
      }
    </style>
  </head>
  @foreach($query as $item)
    <body>

      <!-- Header -->
      <div class="header">
        <div class="logo">
          <p>
            <img src="<?php echo $_SERVER["DOCUMENT_ROOT"].'/assets/img/logo.png'; ?>" height="50">
          </p>
        </div>
        <div class="nama_perusahaan">
          <h6><b>SLIP GAJI KARYAWAN <br /> PT. TECHNO MULTI UTAMA</b></h6>
        </div>
      </div>

      <div class="karyawan">
        <table class="tabel-1">
          <tr>
            <td><b>Nama</b></td>
            <td><b>:</b></td>
            <td><b>{{ $item->nama }}</b></td>
          </tr>
          <tr>
            <td><b>NIK</b></td>
            <td><b>:</b></td>
            <td><b>{{ $item->nik }}</b></td>
          </tr>
          <tr>
            <td><b>Jabatan</b></td>
            <td><b>:</b></td>
            <td><b>{{ $item->jabatan }}</b></td>
          </tr>
          <tr>
            <td><b>Bulan</b></td>
            <td><b>:</b></td>
            <td><b>{{ $item->periode->formatLocalized('%B'.'-'.'%Y') }}</b></td>
          </tr>
        </table>

        <table class="tabel-2">
          <tr>
            <td>Cuti</td>
            <td>:</td>
            <td>{{ round($item->cuti) }}</td>
          </tr>
          <tr>
            <td>Ijin</td>
            <td>:</td>
            <td>{{ round($item->ijin) }}</td>
          </tr>
          <tr>
            <td>Bolos</td>
            <td>:</td>
            <td>{{ round($item->bolos) }}</td>
          </tr>
          <tr>
            <td>Kek jam kerja</td>
            <td>:</td>
            <td>{{ round($item->kek_jam_kerja) }}</td>
          </tr>
          <tr>
            <td>Jam Lembur</td>
            <td>:</td>
            <td>{{ round($item->weekday) }}/{{ round($item->weekend) }}/{{ round($item->holiday) }}</td>
          </tr>
        </table>
      </div>

      <div class="rinci">
        <table align="center" class="rinci rincian">
          <tr>
            <td colspan="3" style="border-style: solid; border-width: 1px;"><center><b>Penghasilan</b></center></td>
            <td colspan="3" style="border-style: solid; border-width: 1px; border-left-style: none;"><center><b>Tunjangan Lain Lain</b></center></td>
            <td colspan="3" style="border-style: solid; border-width: 1px; border-left-style: none;"><center><b>Potongan</b></center></td>
            <td colspan="2" style="border-style: solid; border-width: 1px; border-left-style: none;"><center><b>THP</b></center></td>
          </tr>
          <tr>
            <td width="45" style="border-style: solid; border-width: 1px; border-top-style: none; border-bottom-style: none;">Gaji Dasar</td>
            <td width="50">&nbsp; : Rp</td>
            <td style="border-style: solid; border-width: 1px; border-top-style: none; border-left-style: none; border-bottom-style: none;" align="right">{{ number_format(round(substr(base64_decode($item->gaji_pokok), 6)), 0, ",", ",") }}</td>
            <td>a. Lembur</td>
            <td>&nbsp; : Rp</td>
            <td width="50" style="border-style: solid; border-width: 1px; border-top-style: none; border-left-style: none; border-bottom-style: none;" align="right">{{ number_format(round(substr(base64_decode($item->lembur), 6)), 0, ",", ",") }}</td>
            <td style="border-style: solid; border-width: 1px; border-top-style: none; border-left-style: none; border-bottom-style: none; border-right-style: none;">a. Pinjaman</td>
            <td>&nbsp; Rp</td>
            <td width="50" style="border-style: solid; border-width: 1px; border-top-style: none; border-left-style: none; border-bottom-style: none;" align="right">{{ number_format(round(substr(base64_decode($item->pinjaman), 6)), 0, ",", ",") }}</td>
            <td></td>
            <td style="border-style: solid; border-width: 1px; border-top-style: none; border-left-style: none; border-bottom-style: none;"></td>
          </tr>
          <tr>
            <td style="border-style: solid; border-width: 1px; border-bottom-style: none; border-top-style: none;"><b><u>Tunjangan</u></b></td>
            <td>&nbsp; : Rp</td>
            <td style="border-style: solid; border-width: 1px; border-left-style: none; border-bottom-style: none; border-top-style: none;"></td>
            <td>b. Dll</td>
            <td>&nbsp; : Rp</td>
            <td style="border-style: solid; border-width: 1px; border-top-style: none; border-left-style: none; border-bottom-style: none;" align="right">{{ number_format(round(substr(base64_decode($item->rapel_iso), 6)), 0, ",", ",") }}</td>
            <td>b. Kehadiran</td>
            <td>&nbsp; Rp</td>
            <td style="border-style: solid; border-width: 1px; border-top-style: none; border-left-style: none; border-bottom-style: none;" align="right">{{ number_format(round(substr(base64_decode($item->kehadiran), 6)), 0, ",", ",") }}</td>
            <td></td>
            <td style="border-style: solid; border-width: 1px; border-top-style: none; border-left-style: none; border-bottom-style: none;"></td>
          </tr>
          <tr>
            <td style="border-style: solid; border-width: 1px; border-bottom-style: none; border-top-style: none;">a. Kinerja</td>
            <td>&nbsp; : Rp</td>
            <td style="border-style: solid; border-width: 1px; border-left-style: none; border-bottom-style: none; border-top-style: none;" align="right">{{ number_format(round(substr(base64_decode($item->kinerja), 6)), 0, ',', ',') }}</td>
            <td></td>
            <td></td>
            <td style="border-style: solid; border-width: 1px; border-top-style: none; border-left-style: none; border-bottom-style: none;"></td>
            <td>c. Kekurangan jam kerja</td>
            <td>&nbsp; Rp</td>
            <td style="border-style: solid; border-width: 1px; border-top-style: none; border-left-style: none; border-bottom-style: none;" align="right">{{ number_format(round(substr(base64_decode($item->kekurangan_jam_kerja), 6)), 0, ',', ',') }}</td>
            <td></td>
            <td style="border-style: solid; border-width: 1px; border-top-style: none; border-left-style: none; border-bottom-style: none;"></td>
          </tr>
          <tr>
            <td style="border-style: solid; border-width: 1px; border-bottom-style: none; border-top-style: none;">b. Makan</td>
            <td>&nbsp; : Rp</td>
            <td style="border-style: solid; border-width: 1px; border-left-style: none; border-bottom-style: none; border-top-style: none;" align="right">{{ number_format(round(substr(base64_decode($item->makan), 6)), 0, ',', ',') }}</td>
            <td></td>
            <td></td>
            <td style="border-style: solid; border-width: 1px; border-top-style: none; border-left-style: none; border-bottom-style: none;"></td>
            <td>d. Premi ketenagakerjaan *)</td>
            <td>&nbsp; Rp</td>
            <td style="border-style: solid; border-width: 1px; border-top-style: none; border-left-style: none; border-bottom-style: none;" align="right">{{ number_format(round(substr(base64_decode($item->premi_ketenaga_kerjaan_1), 6)), 0, ',', ',') }}</td>
            <td></td>
            <td style="border-style: solid; border-width: 1px; border-top-style: none; border-left-style: none; border-bottom-style: none;"></td>
          </tr>
          <tr>
            <td style="border-style: solid; border-width: 1px; border-bottom-style: none; border-top-style: none;">c. Transport</td>
            <td>&nbsp; : Rp</td>
            <td style="border-style: solid; border-width: 1px; border-left-style: none; border-bottom-style: none; border-top-style: none;" align="right">{{ number_format(round(substr(base64_decode($item->transport), 6)), 0, ',', ',') }}</td>
            <td></td>
            <td></td>
            <td style="border-style: solid; border-width: 1px; border-top-style: none; border-left-style: none; border-bottom-style: none;"></td>
            <td>e. Premi Kesehatan *)</td>
            <td>&nbsp; Rp</td>
            <td style="border-style: solid; border-width: 1px; border-top-style: none; border-left-style: none; border-bottom-style: none;" align="right">{{ number_format(round(substr(base64_decode($item->premi_kesehatan_1), 6)), 0, ',', ',') }}</td>
            <td></td>
            <td style="border-style: solid; border-width: 1px; border-top-style: none; border-left-style: none; border-bottom-style: none;"></td>
          </tr>
          <tr>
            <td style="border-style: solid; border-width: 1px; border-bottom-style: none; border-top-style: none;">d. BPJS *)</td>
            <td>&nbsp; : Rp</td>
            <td style="border-style: solid; border-width: 1px; border-left-style: none; border-bottom-style: none; border-top-style: none;" align="right">{{ number_format(round(substr(base64_decode($item->bpjs_1), 6)), 0, ',', ',') }}</td>
            <td></td>
            <td></td>
            <td style="border-style: solid; border-width: 1px; border-top-style: none; border-left-style: none; border-bottom-style: none;"></td>
            <td>f. Premi Ketenagakerjaan **)</td>
            <td>&nbsp; Rp</td>
            <td style="border-style: solid; border-width: 1px; border-top-style: none; border-left-style: none; border-bottom-style: none;" align="right">{{ number_format(round(substr(base64_decode($item->premi_ketenaga_kerjaan_2), 6)), 0, ',', ',') }}</td>
            <td></td>
            <td style="border-style: solid; border-width: 1px; border-top-style: none; border-left-style: none; border-bottom-style: none;"></td>
          </tr>
          <tr>
            <td style="border-style: solid; border-width: 1px; border-bottom-style: none; border-top-style: none;">e. BPJS **)</td>
            <td>&nbsp; : Rp</td>
            <td style="border-style: solid; border-width: 1px; border-left-style: none; border-bottom-style: none; border-top-style: none;" align="right">{{ number_format(round(substr(base64_decode($item->bpjs_2), 6)), 0, ',', ',') }}</td>
            <td></td>
            <td></td>
            <td style="border-style: solid; border-width: 1px; border-top-style: none; border-left-style: none; border-bottom-style: none;"></td>
            <td>g. Premi Kesehatan **)</td>
            <td>&nbsp; Rp</td>
            <td style="border-style: solid; border-width: 1px; border-top-style: none; border-left-style: none; border-bottom-style: none;" align="right">{{ number_format(round(substr(base64_decode($item->premi_kesehatan_2), 6)), 0, ',', ',') }}</td>
            <td></td>
            <td style="border-style: solid; border-width: 1px; border-top-style: none; border-left-style: none; border-bottom-style: none;"></td>
          </tr>
          <tr>
            <td style="border-style: solid; border-width: 1px;"><center>Total</center></td>
            <td style="border-style: solid; border-width: 1px; border-left-style: none; border-right-style: none;">&nbsp;&nbsp;&nbsp; Rp</td>
            <td style="border-style: solid; border-width: 1px; border-left-style: none;" align="right">{{ number_format(round(substr(base64_decode($item->gaji_pokok), 6)) + round(substr(base64_decode($item->kinerja), 6)) + round(substr(base64_decode($item->makan), 6)) + round(substr(base64_decode($item->transport), 6)) + round(substr(base64_decode($item->bpjs_1), 6)) + round(substr(base64_decode($item->bpjs_2), 6)), 0, ',', ',') }}</td>
            <td style="border-style: solid; border-width: 1px; border-left-style: none; border-right-style: none;"></td>
            <td style="border-style: solid; border-width: 1px; border-left-style: none; border-right-style: none;">&nbsp;&nbsp;&nbsp; Rp</td>
            <td style="border-style: solid; border-width: 1px; border-left-style: none;" align="right">{{ number_format(round(substr(base64_decode($item->lembur), 6)) + round(substr(base64_decode($item->rapel_iso), 6)), 0, ',', ',') }}</td>
            <td style="border-style: solid; border-width: 1px; border-left-style: none; border-right-style: none;"><center>Total Potongan :</center></td>
            <td style="border-style: solid; border-width: 1px; border-left-style: none; border-right-style: none;">&nbsp; Rp</td>
            <td style="border-style: solid; border-width: 1px; border-left-style: none;" align="right">{{ number_format(round(substr(base64_decode($item->pinjaman), 6)) + round(substr(base64_decode($item->kehadiran), 6)) + round(substr(base64_decode($item->kekurangan_jam_kerja), 6)) + round(substr(base64_decode($item->premi_ketenaga_kerjaan_1), 6)) + round(substr(base64_decode($item->premi_kesehatan_1), 6)) + round(substr(base64_decode($item->premi_ketenaga_kerjaan_2), 6)) + round(substr(base64_decode($item->premi_kesehatan_2), 6)), 0, ',', ',') }}</td>
            <td style="border-style: solid; border-width: 1px; border-left-style: none; border-right-style: none;">&nbsp;&nbsp;&nbsp; Rp</td>
            <td style="border-style: solid; border-width: 1px; border-left-style: none;" align="right">{{ number_format((round(substr(base64_decode($item->gaji_pokok), 6)) + round(substr(base64_decode($item->kinerja), 6)) + round(substr(base64_decode($item->makan), 6)) + round(substr(base64_decode($item->transport), 6)) + round(substr(base64_decode($item->bpjs_1), 6)) + round(substr(base64_decode($item->bpjs_2), 6)) + round(substr(base64_decode($item->lembur), 6))) - (round(substr(base64_decode($item->pinjaman), 6)) + round(substr(base64_decode($item->kehadiran), 6)) + round(substr(base64_decode($item->kekurangan_jam_kerja), 6)) + round(substr(base64_decode($item->premi_ketenaga_kerjaan_1), 6)) + round(substr(base64_decode($item->premi_kesehatan_1), 6)) + round(substr(base64_decode($item->premi_ketenaga_kerjaan_2), 6)) + round(substr(base64_decode($item->premi_kesehatan_2), 6))), 0, ',', ',') }}</td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="border-style: solid; border-width: 1px; border-top-style: none;"><b>THP Dibulatkan</b></td>
            <td style="border-style: solid; border-width: 1px; border-top-style: none; border-right-style: none; border-left-style: none;" width="30">&nbsp;&nbsp;&nbsp; Rp</td>
            <td style="border-style: solid; border-width: 1px; border-top-style: none; border-left-style: none;"><b>{{ number_format(substr(base64_decode($item->pembulatan), 6), 0, ',', ',') }}</b></td>
          </tr>
        </table>
      </div>

      <div class="terbilang">
        <table class="tabel-1">
          <tr>
            <td><i><b>Terbilang :</b></i></td>
            <td><i><b>{{ Terbilang::make(substr(base64_decode($item->pembulatan), 6), ' rupiah') }}</b></i></td>
          </tr>
        </table>
      </div>

      <div class="tanda-tangan">
        <table class="tabel-1 tanda-tangan">
          <tr>
            <td></td>
          </tr>
          <tr>
            <td></td>
          </tr>
          <tr>
            <td></td>
          </tr>
          <tr>
            <td></td>
          </tr>
          <tr>
            <td><b>Mengetahui,</b></td>
          </tr>
          <tr>
            <td><b>PT. TECHNO MULTI UTAMA</b></td>
          </tr>
          <tr>
            <td></td>
          </tr>
          <tr>
            <td></td>
          </tr>
          <tr>
            <td></td>
          </tr>
          <tr>
            <td></td>
          </tr>
          <tr>
            <td></td>
          </tr>
          <tr>
            <td></td>
          </tr>
          <tr>
            <td></td>
          </tr>
          <tr>
            <td></td>
          </tr>
          <tr>
            <td><b><u>Drs. Ahmad Sukardi Ngarobi</u></b></td>
          </tr>
          <tr>
            <td><b>Direktur Keuangan</b></td>
          </tr>
        </table>
        <table class="tabel-2 penerima">
          <tr>
            <td><b>{{ $item->penggajian->formatLocalized('%d %B %Y') }},</b></td>
          </tr>
          <tr>
            <td><center><b>Yang menerima</b></center></td>
          </tr>
          <tr>
            <td></td>
          </tr>
          <tr>
            <td></td>
          </tr>
          <tr>
            <td></td>
          </tr>
          <tr>
            <td></td>
          </tr>
          <tr>
            <td></td>
          </tr>
          <tr>
            <td></td>
          </tr>
          <tr>
            <td></td>
          </tr>
          <tr>
            <td></td>
          </tr>
          <tr>
            <td><center><b>{{ $item->nama }}</b></center></td>
          </tr>
        </table>
      </div>

      <div class="catatan">
        <table class="catatan tabel-1">
          <tr>
            <td><b><u>Catatan:</u></b></td>
            <td></td>
            <td>1. Perhitungan kehadiran dimulai dari setiap tanggal 22 s.d 21 bulan berikutnya, termasuk setelah lebaran.</td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td>2. Perhitungan lembur dibagi 2(dua), yakni lembur hari libur (sabtu dan minggu) = jumlah jam lembur di x 1.85, dan hari lembur biasa<br /> (lembur di hari kerja) = jumlah jam lembur di x 1.35. <i><b>Dihitung lembur bila jumlah jam kerja wajib telah terpenuhi dan ada surat perintah lembur</b></i>.</td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td>3. Jumlah jam kerja dalam 1 (satu) bulan adalah 8 jam/ hari x 22 hari kerja = 176 jam.</td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td>4. Nilai per jam kerja = GD (Gaji Dasar)/176 jam.</td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td>5. *) Premi yang ditanggung oleh perusahaan. **) Premi yang harus ditanggung masing-masing karyawan.</td>
          </tr>
        </table>
      </div>
    </body>
  @endforeach
</html>

<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class KaryawanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// DB::table('karyawan')->truncate();

        DB::table('karyawan')->delete();

        DB::table('karyawan')->insert([
        	[
        		'nik' => '005.11.07',
        		'nama' => 'Bagus Winarmo',
        		'jabatan' => 'Manager Multimedia & Machinery',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '006.11.07',
        		'nama' => 'Sudharmono',
        		'jabatan' => 'Spv. Enginerring Support',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '007.09.08',
        		'nama' => 'Nanang Somantri',
        		'jabatan' => 'Spv. Corporate ADM',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '008.09.08',
        		'nama' => 'Indra Kusuma',
        		'jabatan' => 'Spv. Finance',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '009.07.08',
        		'nama' => 'Elvin Mudhita',
        		'jabatan' => 'Spv. Information Technology',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '011.04.09',
        		'nama' => 'Vian Fitri Yambodo',
        		'jabatan' => 'Programmer',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '021.12.08',
        		'nama' => 'Amiruddin Basyari',
        		'jabatan' => 'Spv. Mechanical Marchinery',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '022.12.08',
        		'nama' => 'Subardjo',
        		'jabatan' => 'Mechanical Engineer',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '028.12.08',
        		'nama' => 'Abdullah Ma\'arif',
        		'jabatan' => 'Mechanical Engineer',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '036.07.09',
        		'nama' => 'Kamaluddin Ramadhan',
        		'jabatan' => 'Animator 3D',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '038.09.09',
        		'nama' => 'Bayu Nugraha',
        		'jabatan' => 'Spv. Multimedia',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '041.05.10',
        		'nama' => 'Dadi Musthapa',
        		'jabatan' => 'Senior 3D Animator',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '042.05.10',
        		'nama' => 'Eko Prasetyo',
        		'jabatan' => 'Sernior 2D Animator',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '043.12.10',
        		'nama' => 'Heriyanto Lesmono',
        		'jabatan' => 'Senior Programmer',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '045.09.11',
        		'nama' => 'Wuryanto',
        		'jabatan' => 'Support',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '047.04.12',
        		'nama' => 'Didik Setyobudi',
        		'jabatan' => 'Instrumentation Eng',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '048.05.12',
        		'nama' => 'Puji Trilaksono',
        		'jabatan' => 'General Affair',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '049.05.12',
        		'nama' => 'Yusuf Rosadi',
        		'jabatan' => 'Accounting',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '056.06.12',
        		'nama' => 'A.J. Messak',
        		'jabatan' => 'Animator 2D',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '054.11.12',
        		'nama' => 'Ade Komar',
        		'jabatan' => 'Animator 2D',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '055.12.12',
        		'nama' => 'Suryana',
        		'jabatan' => 'Spv. Instrumentation',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '056.12.12',
        		'nama' => 'Hendrik Timotius',
        		'jabatan' => 'Logistic',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '059.03.13',
        		'nama' => 'Dodik Mailairi',
        		'jabatan' => 'Support',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '060.03.11',
        		'nama' => 'Triana Putra Aprijanto',
        		'jabatan' => 'Mechanical Technician',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '061.04.13',
        		'nama' => 'Yudha Wangsamenggala',
        		'jabatan' => 'PLC Programmer',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '063.05.13',
        		'nama' => 'Nenah Rosmini',
        		'jabatan' => 'Mechanical Engineer',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '064.05.13',
        		'nama' => 'Edo Ahmad Murtado',
        		'jabatan' => 'Mechanical Engineer',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '065.05.13',
        		'nama' => 'Wawan Setiawan',
        		'jabatan' => 'Mechanical Engineer',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '069.09.13',
        		'nama' => 'Rully Shara Monica',
        		'jabatan' => 'Accounting',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '070.11.13',
        		'nama' => 'M. Hamzah',
        		'jabatan' => 'Mechanical Engineer',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '071.02.14',
        		'nama' => 'Budiharto',
        		'jabatan' => 'Instrumentation Tech',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '072.02.14',
        		'nama' => 'Gatot Eko S Wibowo',
        		'jabatan' => 'Animator 3D',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '077.06.14',
        		'nama' => 'Hafidz Faizal',
        		'jabatan' => 'Logistic',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '079.08.14',
        		'nama' => 'Soleh',
        		'jabatan' => 'Drafter',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '080.08.14',
        		'nama' => 'Dinar Tiara',
        		'jabatan' => 'Instrumentation Eng',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '081.02.15',
        		'nama' => 'Asep Abdurohman',
        		'jabatan' => 'Programmer',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '082.02.15',
        		'nama' => 'Ahmad Siswanto',
        		'jabatan' => 'Programmer 3D',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '084.06.15',
        		'nama' => 'Andri Krisna Senjaya',
        		'jabatan' => 'Sekretaris',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '085.06.15',
        		'nama' => 'Dhira Ramadhan R',
        		'jabatan' => 'Mechanical Technician',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '086.06.15',
        		'nama' => 'Feri Ferdiana Setiasaputra',
        		'jabatan' => 'Instrumentation/Electrical Eng',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '087.06.15',
        		'nama' => 'Ela Nurhayati',
        		'jabatan' => 'Programmer',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '088.06.15',
        		'nama' => 'Heri Hermawan',
        		'jabatan' => 'Programmer',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '090.09.15',
        		'nama' => 'Agus Hermawan',
        		'jabatan' => 'Programmer',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '091.01.15',
        		'nama' => 'Nisa Fusti Manikam',
        		'jabatan' => 'Programmer',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '092.10.15',
        		'nama' => 'Dede Sutaryat',
        		'jabatan' => 'Instrumentation/Electrical Eng',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '093.03.16',
        		'nama' => 'Dani Gunawan',
        		'jabatan' => 'Support/OB Workshop',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '079.08.14',
        		'nama' => 'Fitra Susanto',
        		'jabatan' => 'Mechanical Technician',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '097.10.16',
        		'nama' => 'Trisnandi',
        		'jabatan' => 'Administration',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '083.04.15',
        		'nama' => 'Sopian',
        		'jabatan' => 'Mechanical Technician',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '099.12.16',
        		'nama' => 'Adi Sulaiman',
        		'jabatan' => 'Animator 2D',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '100.02.17',
        		'nama' => 'Sinta Noviana',
        		'jabatan' => 'Animator 2D',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '102.03.17',
        		'nama' => 'Herman',
        		'jabatan' => 'Animator 2D',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '103.05.17',
        		'nama' => 'Dani Setiawan',
        		'jabatan' => 'Animator 3D',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '104.07.17',
        		'nama' => 'Yudha Dwi Pangestu',
        		'jabatan' => 'Subject Matter Expert',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '105.07.17',
        		'nama' => 'Randi Pramayuda',
        		'jabatan' => 'Mechanical Technician',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '095.10.16',
        		'nama' => 'Dadi Mulyadi',
        		'jabatan' => 'Subject Matter Expert',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        	[
        		'nik' => '096.10.16',
        		'nama' => 'Marga Sanjaya',
        		'jabatan' => 'Realtime Programmer',
        		'password' => bcrypt('123'),
        		'created_at' => Carbon::now()
        	],
        ]);
    }
}

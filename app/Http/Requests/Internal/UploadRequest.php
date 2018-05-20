<?php

namespace App\Http\Requests\Internal;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CheckFileNameDataAbsensi;
use App\Rules\CheckFileNameDataGaji;

class UploadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
     public function rules()
     {
       return [
         'periode'                        => ['required'],
         'penggajian'                     => ['required'],
         'excel_gaji'                     => ['required', 'mimes:xlsx'],
         'temp_excel_gaji'                => [new CheckFileNameDataGaji],
         'excel_rekap_absensi'            => ['required', 'mimes:xlsx'],
         'temp_excel_rekap_absensi'       => [new CheckFileNameDataAbsensi]
       ];
     }

     public function messages()
     {
       return [
         'periode.required'               => 'Periode Penggajian perlu diisi!',
         'penggajian.required'            => 'Tanggal penggajian perlu diisi!',
         'excel_gaji.required'            => 'File spreadsheet data gaji harus disisipkan!',
         'excel_gaji.mimes'               => 'Format file spreadsheet data gaji tidak sesuai!',
         'excel_rekap_absensi.required'   => 'File spreadsheet data rekap absensi harus disisipkan!',
         'excel_rekap_absensi.mimes'      => 'Format file spreadsheet data rekap absensi tidak sesuai!',
       ];
     }
}

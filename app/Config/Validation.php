<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------
    public $createAkun = [
        'id_akun' => 'required|is_unique[akun.id_akun]',
        'nama_akun' => 'required|is_unique[akun.nama_akun]',
        'jenis_akun' => 'required'
    ];

    public $editAkun = [
        'id_akun' => 'required|is_unique[akun.id_akun,id_akun,{id_akun}]',
        'nama_akun' => 'required|is_unique[akun.nama_akun,id_akun,{id_akun}]',
        'jenis_akun' => 'required'
    ];

    public $createPengguna = [
        'nama_pengguna' => 'required',
        'tanggal_lahir_pengguna' => 'required',
        'username_pengguna' => 'required|is_unique[pengguna.username_pengguna]',
        'password_pengguna' => 'required',
        'hak_akses_pengguna' => 'required'
    ];
    
    public $editPengguna = [
        'nama_pengguna' => 'required',
        'tanggal_lahir_pengguna' => 'required',
        'username_pengguna' => 'required|is_unique[pengguna.username_pengguna,id_pengguna,{id_pengguna}]',
        'hak_akses_pengguna' => 'required'
    ];

    public $createBarang = [
        'nama_barang' => 'required',
        'stok_barang' => 'required|integer',
        'satuan_barang' => 'required',
        'harga_barang' => 'required|integer'
    ];

    public $editBarang = [
        'nama_barang' => 'required',
        'stok_barang' => 'required|integer',
        'satuan_barang' => 'required',
        'harga_barang' => 'required|integer'
    ];

    public $createPelanggan = [
        'nama_pelanggan' => 'required',
        'no_hp_pelanggan' => 'required|is_unique[pelanggan.no_hp_pelanggan]',
        'alamat_pelanggan' => 'required',
    ];

    public $editPelanggan = [
        'nama_pelanggan' => 'required',
        'no_hp_pelanggan' => 'required|is_unique[pelanggan.no_hp_pelanggan,id_pelanggan,{id_pelanggan}]',
        'alamat_pelanggan' => 'required',
    ];

}

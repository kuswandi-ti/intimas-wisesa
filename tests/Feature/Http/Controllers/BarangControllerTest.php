<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\User;

class BarangControllerTest extends TestCase
{
    use WithFaker;

    /**
     * @test
     */
    public function it_stores_data()
    {
        // Membuat objek user yang otomatis menambahkannya ke database.
        $user = factory(User::class)->create();

        // Acting as berfungsi sebagai autentikasi, jika kita menghilangkannya maka akan error.
        $response = $this->actingAs($user)
        // Hit post ke method store, fungsinya akan lari ke fungsi store.
        ->post(route('barang.store'), [
            // Isi parameter sesuai kebutuhan request
            'kode_barang' => $this->faker->words(5, true),
            'nama_barang' => $this->faker->words(10, true),
            'deskripsi' => $this->faker->words(15, true),
            'nama_customer' => $this->faker->words(10, true),
            'nama_supplier' => $this->faker->words(10, true),
            'satuan' => $this->faker->words(10, true),
        ]);

        // Tuntutan status 302, yang berarti redirect status code.
        $response->assertStatus(302);

        // Tuntutan bahwa abis melakukan POST URL akan dialihkan ke URL product atau routenya adalah product.index
        $response->assertRedirect(route('barang.index'));
    }
}

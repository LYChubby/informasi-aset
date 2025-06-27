<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Asset;
use App\Models\AssetReport;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReportControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_report_view()
    {
        $user = User::factory()->create();
        $this->actingAs($user)
            ->get(route('reports.create'))
            ->assertStatus(200)
            ->assertSee('Tambah Laporan');
    }

    public function test_store_report_for_penambahan()
    {
        $user = User::factory()->create();

        $data = [
            'title' => 'penambahan',
            'laporan' => 'Menambahkan aset baru',
            'nama_aset' => 'Laptop Lenovo',
            'kategori' => 'Elektronik',
            'lokasi' => 'Gudang 1',
        ];

        $this->actingAs($user)
            ->post(route('reports.store'), $data)
            ->assertRedirect(route('reports.index'));

        $this->assertDatabaseHas('asset_reports', [
            'title' => 'penambahan',
            'laporan' => 'Menambahkan aset baru',
            'nama_aset' => 'Laptop Lenovo',
            'user_id' => $user->id,
        ]);
    }

    public function test_store_report_for_perbaikan()
    {
        $user = User::factory()->create();
        $asset = Asset::factory()->create();

        $data = [
            'title' => 'perbaikan',
            'laporan' => 'Perlu perbaikan',
            'aset_id' => $asset->id,
        ];

        $this->actingAs($user)
            ->post(route('reports.store'), $data)
            ->assertRedirect(route('reports.index'));

        $this->assertDatabaseHas('asset_reports', [
            'title' => 'perbaikan',
            'laporan' => 'Perlu perbaikan',
            'aset_id' => $asset->id,
            'user_id' => $user->id,
        ]);
    }

    public function test_show_own_report()
    {
        $user = User::factory()->create();
        $report = AssetReport::factory()->create(['user_id' => $user->id]);

        $this->actingAs($user)
            ->get(route('reports.show', $report->id))
            ->assertStatus(200)
            ->assertSee($report->laporan);
    }

    public function test_user_cannot_view_others_report()
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $report = AssetReport::factory()->create(['user_id' => $otherUser->id]);

        $this->actingAs($user)
            ->get(route('reports.show', $report->id))
            ->assertStatus(403);
    }
}

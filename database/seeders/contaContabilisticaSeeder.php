<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContaContabilisticaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('conta_contabilistica')->insert([
            [
                'codigo' => '1',
                'descricao' => 'Ativo',
                'tipo' => 'S',
                'conta_pai_id' => null,
                'classe' => 'Ativo',
                'moeda' => 'AKZ',
                'ativa' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'codigo' => '10',
                'descricao' => 'Caixa',
                'tipo' => 'T',
                'conta_pai_id' => 1,
                'classe' => 'Ativo',
                'moeda' => 'AKZ',
                'ativa' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'codigo' => '1000',
                'descricao' => 'Caixa USD',
                'tipo' => 'A',
                'conta_pai_id' => 2,
                'classe' => 'Ativo',
                'moeda' => 'USD',
                'ativa' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'codigo' => '4',
                'descricao' => 'Terceiros',
                'tipo' => 'S',
                'conta_pai_id' => null,
                'classe' => 'Terceiros',
                'moeda' => 'AKZ',
                'ativa' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'codigo' => '400001',
                'descricao' => 'Clientes - Prêmios a Receber',
                'tipo' => 'A',
                'conta_pai_id' => 4,
                'classe' => 'Terceiros',
                'moeda' => 'AKZ',
                'ativa' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Seed 
        Product::create([
            'name' => 'Laptop MSI',
            'category' => 'Informática',
            'price' => 1100.00,
            'description' => 'Acer Nitro 5 AN515-55 - Ordenador Portátil Gaming 15.6" Full HD',
        ]);

        Product::create([
            'name' => 'Chaqueta de Cuero',
            'category' => 'Ropa',
            'price' => 38.10,
            'description' => 'Jack & Jones Chaqueta de Cuero sintético para Hombre',
        ]);

        Product::create([
            'name' => 'Smart TV Samsung',
            'category' => 'Electrónica',
            'price' => 379.99,
            'description' => 'Samsung UE43TU7095KXXC - Smart TV 43" 4K UHD',
        ]);

        Product::create([
            'name' => 'Mouse Inalámbrico Logitech',
            'category' => 'Electrónica',
            'price' => 19.99,
            'description' => 'Logitech M185 Ratón Inalámbrico Óptico 2.4 GHz con Nano Receptor USB',
        ]);

        Product::create([
            'name' => 'Teclado Mecánico RGB',
            'category' => 'Informática',
            'price' => 59.90,
            'description' => 'Teclado Mecánico Gaming con Retroiluminación RGB y Switches Blue',
        ]);

        Product::create([
            'name' => 'Monitor Samsung 24"',
            'category' => 'Informática',
            'price' => 149.00,
            'description' => 'Samsung Monitor LED 24" Full HD 75Hz con Tecnología FreeSync',
        ]);


        Product::create([
            'name' => 'Auriculares Bluetooth',
            'category' => 'Electrónica',
            'price' => 35.50,
            'description' => 'Auriculares Bluetooth Inalámbricos con Micrófono y Cancelación de Ruido',
        ]);

        Product::create([
            'name' => 'Smartphone Xiaomi Redmi',
            'category' => 'Electrónica',
            'price' => 249.99,
            'description' => 'Xiaomi Redmi Note 12 con Pantalla AMOLED 6.67" y 128GB de Almacenamiento',
        ]);

        Product::create([
            'name' => 'Cámara Web Full HD',
            'category' => 'Informática',
            'price' => 42.75,
            'description' => 'Cámara Web 1080p con Micrófono Integrado para PC y Portátil',
        ]);

        Product::create([
            'name' => 'Zapatillas Deportivas Hombre',
            'category' => 'Calzado',
            'price' => 54.95,
            'description' => 'Zapatillas Deportivas para Hombre con Suela de Goma Antideslizante',
        ]);

        Product::create([
            'name' => 'Zapatillas Running Mujer',
            'category' => 'Calzado',
            'price' => 61.20,
            'description' => 'Zapatillas de Running para Mujer con Amortiguación y Transpirables',
        ]);

        Product::create([
            'name' => 'Camiseta Básica Algodón',
            'category' => 'Ropa',
            'price' => 12.99,
            'description' => 'Camiseta de Manga Corta 100% Algodón para Hombre, Color Negro',
        ]);

        Product::create([
            'name' => 'Pantalón Vaquero Slim',
            'category' => 'Ropa',
            'price' => 39.90,
            'description' => 'Pantalón Vaquero Slim Fit Azul Oscuro para Hombre',
        ]);

        Product::create([
            'name' => 'Vestido Floral Verano',
            'category' => 'Ropa',
            'price' => 29.50,
            'description' => 'Vestido Corto de Verano Estampado Floral para Mujer',
        ]);

        Product::create([
            'name' => 'Reloj Inteligente Fitness',
            'category' => 'Electrónica',
            'price' => 79.99,
            'description' => 'Smartwatch con Monitor de Ritmo Cardíaco y Notificaciones de Smartphone',
        ]);

        Product::create([
            'name' => 'Mochila para Portátil 15.6"',
            'category' => 'Accesorios',
            'price' => 27.80,
            'description' => 'Mochila Antirrobo para Portátil de hasta 15.6" con Puerto USB',
        ]);

        Product::create([
            'name' => 'Lámpara de Escritorio LED',
            'category' => 'Hogar',
            'price' => 24.60,
            'description' => 'Lámpara de Escritorio LED Regulable con Puerto de Carga USB',
        ]);

        Product::create([
            'name' => 'Set de Sartenes Antiadherentes',
            'category' => 'Hogar',
            'price' => 69.95,
            'description' => 'Juego de 3 Sartenes Antiadherentes Apta para Todo Tipo de Cocinas',
        ]);

        Product::create([
            'name' => 'Balón de Fútbol Talla 5',
            'category' => 'Deportes',
            'price' => 18.25,
            'description' => 'Balón de Fútbol Talla 5 de Entrenamiento y Partido',
        ]);

        Product::create([
            'name' => 'Mancuernas Ajustables 20kg',
            'category' => 'Deportes',
            'price' => 89.90,
            'description' => 'Set de Mancuernas Ajustables hasta 20 kg para Entrenamiento en Casa',
        ]);

        Product::create([
            'name' => 'Juego de Construcción 500 Piezas',
            'category' => 'Juguetes',
            'price' => 45.00,
            'description' => 'Juego de Bloques de Construcción 500 Piezas para Niños a partir de 6 años',
        ]);

        Product::create([
            'name' => 'Secador de Pelo Profesional',
            'category' => 'Belleza',
            'price' => 31.99,
            'description' => 'Secador de Pelo Profesional 2200W con Función Iónica y Difusor',
        ]);

    
        
    }
}

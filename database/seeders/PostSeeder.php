<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $category = Category::factory()->create([
            'name' => 'Recetas Dulces',
        ]);


        $category2 = Category::factory()->create([
            'name' => 'Recetas Saladas',
        ]);


        Post::factory()
        ->hasAttached($category)
        ->create([
            'title' => 'Lemon Pie',
            'content' => '<div><strong>Ingredientes</strong><br>60 minutos<br>6 raciones<br>-------- Para la masa:<br>200 g Harina 0000<br>100 g Manteca<br>4 cdas Azúcar<br>1 Huevo<br>1 Yema<br>1/2 Ralladura de limón (bien chiquito y sin lo blanco)<br>--------- Para el relleno:<br>1 Limón (jugo y ralladura sin lo blanco)<br>100 g Azúcar<br>200 ml Agua<br>1 cda Manteca<br>2 cdas Fécula de Maíz<br>2 Yemas<br>------- Merengue suizo<br>3 Claras (sobrantes de la receta)<br>9 cdas Azúcar<br>(si se desea mucho merengue agregar por cada clara extra, 3 cucharadas de azúcar)</div>',
            'thumbnail' => '1717975336.png',
            'user_id' => 1,
            'created_at' => '2024-05-23 19:47:15',
            'updated_at' => '2024-05-23 19:47:15',
            'is_published' => true
        ]);

       

       /* Post::factory()
        ->hasAttached($category)
        ->create([
            'title' => 'Cheesecake',
            'content' => '<div><strong>Ingredientes<br></strong><br></div><ul><li>2 tazas de galletas Marías desmoronadas<br><br></li><li>1 1/2 cucharadas de mantequilla, suavizada<br><br></li><li>680 gramos de queso crema, suavizado<br><br></li><li>1 lata (397 gramos) de leche condensada<br><br></li><li>4 huevos<br><br></li><li>225 mililitros de crema ácida<br><br></li><li>1 cucharada de extracto de vainilla<br><br></li></ul><div><strong><br>Preparación<br></strong><br></div><ol><li>Precalienta el horno a 180 °C (350 °F).<br><br></li><li>Coloca en un tazón 1 1/2 tazas de galletas molidas y la mantequilla. Mezcla con tus manos humedeciendo completamente las galletas. Coloca en un molde para hornear desmontable de 25 centímetros de diámetro, y presiona con tos manos distribuyendo uniformemente en todo el fondo del molde.<br><br></li><li>Bate en un tazón grande el queso crema, hasta que se esponje un poco. Sin dejar de batir, agrega la leche condensada y sigue batiendo hasta integrar perfectamente. Añade los huevos, crema ácida y vainilla, y bate bien. Vierte dentro del molde con la costra de galletas Marías. Espolvorea encima el resto de las galletas molidas.<br><br></li><li>Hornea entre 45 y 50 minutos. Retira del horno y deja enfriar a temperatura ambiente, luego refrigera hasta que esté bien frío.</li></ol>',
            'thumbnail' => '1717975699.png',
            'user_id' => 1,
            'created_at' => '2024-05-23 19:47:15',
            'updated_at' => '2024-05-23 19:47:15'
        ]); */

        Post::factory()
        ->hasAttached($category2)
        ->create([
            'title' => "Pizza Napolitana",
            'content' => "<div><strong>Ingredientes</strong><br>3 tazas de harina 000<br>2 cdas. de sal<br>1 cda. de levadura en polvo<br>1 taza de agua<br>Para la salsa<br>400 gr. de tomates en conserva<br>1 diente de ajo<br>1 cda. de tomillo seco<br>200 gr. de muzzarella de búfala<br>Orégano<br><br><strong>Pasos</strong><br>Hacer la masa colocando la harina en un bowl y hacer un hueco en el centro.<br>Colocar la levadura en polvo y el agua tibia.<br>Mezclar todo y dejar reposar 30 minutos.<br>Colocar los tomates en una olla junto al ajo y el tomillo.<br>Estirar la masa y colocar la salsa de tomate, el queso y orégano.<br>Hornear 5 minutos en horno fuerte.</div>",
            'thumbnail' => '1718004548.png',
            'user_id' => 1,
            'created_at' => '2024-06-06 19:47:15',
            'updated_at' => '2024-06-06 19:47:15',
            'is_published' => true

        ]);

      
    }
}

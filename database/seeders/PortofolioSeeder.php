<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PortofolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('portofolios')->insert(
            [   'title' => 'Portofolio 1',
                'rating' => '5',
                'client' => 'UNEJ Akper',
                'completed' => '2021-03-03',
                'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fugit harum ullam accusantium facere velit dolore fuga dignissimos recusandae minima facilis eaque esse nemo, et praesentium provident dolorem? Fugit, ea velit.',
                'additional_description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vitae, itaque? Rem minima perferendis a dolores voluptatum ducimus officiis minus illo consectetur. A, blanditiis sapiente placeat sint dolorem laboriosam? Enim, qui iste quaerat accusamus debitis officiis beatae ullam ratione quae voluptatum, natus consequuntur vel! Ab, accusantium, ratione at debitis voluptatibus nemo animi quam libero tempora dolorem reprehenderit impedit facere laboriosam maxime voluptate alias quo exercitationem illo nisi dolore odit recusandae, nihil nam! Quae, explicabo. Facilis necessitatibus doloremque modi impedit, odit magni incidunt ex eligendi animi velit, similique culpa et maiores non officia ullam a odio aliquid architecto fuga tenetur fugit delectus.',
                'image' => 'cv1k.png',
                'linkPorto' => 'https://colorlib.com/wp/bootstrap-file-uploads/',
            ]
        );
        DB::table('portofolios')->insert(
            [
                'title' => 'Portofolio 2',
                'rating' => '4',
                'client' => 'UIN Malang',
                'completed' => '2021-07-03',
                'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fugit harum ullam accusantium facere velit dolore fuga dignissimos recusandae minima facilis eaque esse nemo, et praesentium provident dolorem? Fugit, ea velit.',
                'additional_description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vitae, itaque? Rem minima perferendis a dolores voluptatum ducimus officiis minus illo consectetur. A, blanditiis sapiente placeat sint dolorem laboriosam? Enim, qui iste quaerat accusamus debitis officiis beatae ullam ratione quae voluptatum, natus consequuntur vel! Ab, accusantium, ratione at debitis voluptatibus nemo animi quam libero tempora dolorem reprehenderit impedit facere laboriosam maxime voluptate alias quo exercitationem illo nisi dolore odit recusandae, nihil nam! Quae, explicabo. Facilis necessitatibus doloremque modi impedit, odit magni incidunt ex eligendi animi velit, similique culpa et maiores non officia ullam a odio aliquid architecto fuga tenetur fugit delectus.',
                'image' => 'businesscard.png',
                'linkPorto' => 'https://colorlib.com/wp/bootstrap-file-uploads/',
            ]
        );
    }
}
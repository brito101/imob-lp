<?php

namespace Database\Seeders;

use App\Models\User;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $hero_text = '<h6><br><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAALsAAAB6CAYAAADnJCJ7AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAydpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDkuMC1jMDAxIDc5LjE0ZWNiNDJmMmMsIDIwMjMvMDEvMTMtMTI6MjU6NDQgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIFBob3Rvc2hvcCAyNC4yIChXaW5kb3dzKSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDo0RjkyNjcwREJFODcxMUVEQkZFOEEyRjlBOEQ0RDlDQiIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDo0RjkyNjcwRUJFODcxMUVEQkZFOEEyRjlBOEQ0RDlDQiI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjRGOTI2NzBCQkU4NzExRURCRkU4QTJGOUE4RDREOUNCIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjRGOTI2NzBDQkU4NzExRURCRkU4QTJGOUE4RDREOUNCIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+/2JGPgAAKDpJREFUeNrs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" data-filename="logo-1.png" style="width: 187px;"></h6><h2 class="fw-bold display-2">O Charme italiano <b style=""><font color="#eba167">para a sua vida</font></b></h2><p class="">Conheça o empreendimento exclusivo da <b style=""><font color="#eba167">Citaà Engenharia</font></b></p>';

        DB::table('pages')->insert([
            // 'logo_header',
            // 'logo_footer',
            'hero_text' =>  $hero_text,
            'benefits_text' => '<h6 class="">Desfrute de <font color="#eba167">momentos</font></h6><h2 class=" fw-bold display-4 mb-3"><font color="#eba167">Inesquecíveis&nbsp;</font>com a sua família</h2><p>Aproveite <font color="#eba167">todas as vantagens</font> de viver em um empreendimento de qualidade, com <font color="#eba167">segurança 24 horas</font>, lazer completo e localização privilegiada.</p><p>Mas o que realmente torna o Felicittà Barra único é <font color="#eba167">seu DNA</font> italiano. Inspirado nas charmosas e sofisticadas cidades italianas, esse empreendimento traz um toque de elegância e sofisticação para sua vida.</p>',
            'benefits_video' => 'https://www.youtube.com/embed/dsAHfyEatKs?controls=0&amp;rel=0&amp;playsinline=0&amp;modestbranding=0&amp;autoplay=0&amp;enablejsapi=1&amp;origin=https%3A%2F%2Fwww.vivanofelicittabarra.com.br&amp;widgetid=1',
            'map' => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14957.011059817825!2d-40.333745!3d-20.413677!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xb83f759810d019%3A0x11c6a76182424ca0!2sCondominio%20Villaggio%20Santa%20Paula!5e0!3m2!1spt-BR!2sus!4v1682451143225!5m2!1spt-BR!2sus',
            'conditions' => '<h6 class="">Adquira seu imóvel na <span style="font-weight: normal;"><font color="#eba167">Città</font></span> com</h6><h2 class="fw-bold display-4 mb-3"><b><font color="#eba167">Condições exclusivas!</font></b></h2><p>Condições especiais para os apartamentos do Felicittà Barra</p><p class="">Entrada Facilitada</p><p class="">Condições facilitadas para o pagamento do seu imóvel</p><p class="">Facilidade de financiamento e a garantia de qualidade</p><p class="">Excelente custo-benefício para compra de apto na planta</p><p class="">Realizamos financiamento direto com a Caixa Econômica Federal ou outra instituição financeira</p><p class="">Excelente custo-benefício para compra de apto na planta</p><p class="">Qualidade e segurança de uma empresa com mais de 29 anos de mercado</p>',
            'address' => 'Av. Dr. Dório Silva – Santa Paula, Vila Velha – ES',
            'phone' => '27 3340 – 8184 | 27 98147 – 6453',
            'tour' => ' <h6>Um projeto que </h6>
            <h2>traz a Itália para a sua casa</h2>
            <p>O Felicittà Barra é o empreendimento perfeito para quem busca essa experiência única. Aqui, você
                encontrará tudo o que precisa para viver uma vida plena e feliz.</p>
            <p>Com um projeto pensado para trazer o melhor da cultura e da beleza italiana para o Brasil, você
                poderá desfrutar de um estilo de vida elegante e acolhedor, sem abrir mão da segurança e do conforto
                que você merece.
            </p>',
            'link_tour' => 'https://my.matterport.com/show/?m=kGusMfwGT5L&play=1&brand=1&qs=1&ts=1&title=1&tourcta=2&vrcoll=0&dh=1&mt=1&lang=pt?utm_source=facebook&utm_medium=cpc&utm_campaign=tour_virtual_lp_2Q&utm_id=&utm_term=tour_virtual_lp_2Q&utm_content=tour_virtual_lp_2Q',
            // 'email',
            // 'facebook',
            // 'twitter',
            'instagram' => 'https://www.instagram.com/cittaengenharia',
            // 'youtube',
            'user_id' => User::first()->id,
            'created_at' => new DateTime('now')
        ]);
    }
}

=== Dujour Widget ===
Contributors: dujour 
Plugin link: http://dujourapp.com
Tags: dujour, look, day, dia, jour, look do dia, look of the day
Requires at least: 3.0.1
Tested up to: 3.5.1
Stable tag: 0.3
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Compartilhe seus looks do dia no seu blog usando o Dujour!

== Description ==

Compartilhe seus looks do dia no seu blog usando o Dujour! Conheça mais em: [http://dujourapp.com][dujour site]

Fácil de instalar e configurar!
Seus looks no seu blog em cinco minutos!

*Obs.:* O Widget exibe apenas looks de usuários **cadastrados no [Dujour][dujour site]**. Para criar sua conta, visite o [nosso site][dujour site] e baixe a aplicação!

[dujour site]: http://dujourapp.com "Conheça o Dujour!"

== Installation ==

Para instalar o Widget do Dujour no seu blog, siga os passos abaixo:

1. Na sua tela de administração do Wordpress, vá para o menu "Plugins", e clique no botão "Novos Plugins".

1. Na caixa de busca que irá aparecer, pesquise por "Dujour".

1. Selecione o plugin "Dujour".

1. Clique em "Instalar".

1. Na sua tela de administração do Wordpress, vá para o menu "Plugins", ative o plugin do Dujour.

1. Na sua tela de administação de Wordpress, vá para "Aparência" e então "Widgets".

1. Clique e arraste o Widget do Dujour para o local desejado.

Pronto!



= Opcional: método avançado de uso =

Caso não tenha interesse em utilizar o plugin do Dujour em forma de widget padrão, é possível utilizá-lo diretamente com código PHP. Para tanto, basta executar o seguinte código no local em que deseja inserir o seu look do dia:

`<?php DujourWidget::printDujourWidget( 'nome-de-usuario', 'largura', 'fundo-escuro' ) ?>`

Por exemplo:

`<?php DujourWidget::printDujourWidget( 'dujour', '200px', '' ) ?>`
ou
`<?php DujourWidget::printDujourWidget( 'dujour', '100%', 'dark' ) ?>`


== Frequently Asked Questions ==

= Qual o nome de usuário que devo informar? =

Você deve informar o nome de usuário que utiliza no aplicativo Dujour. Para baixá-lo e se cadastrar, visite o site: [http://dujourapp.com][dujour site]

= Posso inserir o widget várias vezes em uma mesma página? =

Sim!

[dujour site]: http://dujourapp.com "Conheça o Dujour!"

== Screenshots ==

1. Tela de configuração do Widget Dujour
2. Seu look do dia exibido no seu blog

== Changelog ==

= 0.3 =
* Versão pública inicial

== Upgrade Notice ==

= 0.3 =
* Versão pública inicial
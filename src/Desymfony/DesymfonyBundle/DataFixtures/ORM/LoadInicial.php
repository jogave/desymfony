<?php

namespace Desymfony\DesymfonyBundle\DataFixtures;

use Doctrine\Common\DataFixtures\AbstractFixture;

use Desymfony\DesymfonyBundle\Entity\Ponencia,
    Desymfony\DesymfonyBundle\Entity\Usuario,
    Desymfony\DesymfonyBundle\Entity\Ponente;

class LoadInicial extends AbstractFixture
{
    public function load($manager)
    {
        $ponentes = array(
            'javierEguiluz' => array(
                'nombre' => 'Javier',
                'apellidos' => 'Eguiluz',
                'biografia' => 'Javier es el fundador de symfony.es, el sitio web más influyente de la comunidad hispana de Symfony. Programador apasionado por Symfony desde sus primeras versiones, actualmente se dedica a la formación.',
                'telefono'  => '600XXXXXX',
                'url'       => 'http://javiereguiluz.com',
                'email'     => 'javier@xxx.xx',
                'linkedin'  => 'http://www.linkedin.com/in/javiereguiluz',
                'twitter'   => 'http://www.twitter.com/javiereguiluz'
            ),
            'javierLopez' => array(
                'nombre' => 'Javier',
                'apellidos' => 'López',
                'biografia' => 'Javier es co-fundador de Flai Webnected, una empresa especializada en el desarrollo de aplicaciones con este framework. Además de programar, también imparte clases de PHP en la Universidad de Córdoba.',
                'telefono' => '600XXXXXX',
                'url' => 'http://www.loalf.com/',
                'email' => 'javier@xxx.xx',
                'linkedin' => 'http://es.linkedin.com/in/loalf',
                'twitter' => 'http://www.twitter.com/loalf'
            ),
            'marcosLabad' => array(
                'nombre' => 'Marcos',
                'apellidos' => 'Labad',
                'biografia' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'telefono' => '600XXXXXX',
                'url' => 'http://www.quevidaesta.com',
                'email' => 'marcos@xxx.xx',
                'linkedin' => 'http://www.linkedin.com/in/marcoslabad',
                'twitter' => 'http://twitter.com/esmiz'
            )
        );
        foreach ($ponentes as $referencia => $datosPonente) {
            $ponente = new Ponente();

            foreach ($datosPonente as $propiedad => $valor) {
                $ponente->{'set'.ucfirst($propiedad)}($valor);
            }

            $this->addReference($referencia, $ponente);

            $manager->persist($ponente);
        }

        $manager->flush();

        for ($i = 0; $i < 100; $i++) {
            $usuario = new Usuario();

            $usuario->setNombre("Pedro$i");
            $usuario->setApellidos("Jiménez Giménez");
            $usuario->setDni('11111111H');
            $usuario->setDireccion("Calle Leganitos");
            $usuario->setTelefono('666666666');
            $usuario->setEmail("pedro$i@example.com");
            $usuario->setPassword("patata");

            $this->addReference("Pedro$i", $usuario);
            $manager->persist($usuario);
        }

        $manager->flush();

        $ponencia = new Ponencia();
        $ponencia->setTitulo('Instalación y puesta a punto');
        $ponencia->setDescripcion('Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
        $ponencia->setFecha(new \DateTime('2011-07-01'));
        $ponencia->setHora(new \DateTime('9:45:00'));
        $ponencia->setDuracion(45);
        $ponencia->setIdioma('es');
        $ponencia->setPonente(
            $manager->merge($this->getReference('javierEguiluz'))
        );
        $ponencia->addUsuarios($manager->merge($this->getReference('Pedro1')));
        $ponencia->addUsuarios($manager->merge($this->getReference('Pedro2')));

        $manager->persist($ponencia);

        $ponencia = new Ponencia();
        $ponencia->setTitulo('La vista. Twig');
        $ponencia->setDescripcion('Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.');
        $ponencia->setFecha(new \DateTime('2011-07-01'));
        $ponencia->setHora(new \DateTime('12:00:00'));
        $ponencia->setDuracion(60);
        $ponencia->setIdioma('es');
        $ponencia->setPonente(
            $manager->merge($this->getReference('marcosLabad'))
        );
        $ponencia->addUsuarios($manager->merge($this->getReference('Pedro1')));
        $ponencia->addUsuarios($manager->merge($this->getReference('Pedro2')));
        
        $manager->persist($ponencia);

        $manager->flush();
    }
}

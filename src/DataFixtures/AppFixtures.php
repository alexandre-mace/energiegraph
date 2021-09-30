<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Graph;
use App\Entity\Subcategory;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('test@test.fr');
        $user->setPassword('$2y$10$ZSbETDamFjS.OD/iOolpnO2TykE40heQfDF02ailVsTDyxag1Xl6K');
        $user->setRoles(['ROLE_USER', 'ROLE_ADMIN']);
        $manager->persist($user);

        $category = new Category();
        $category->setTitle('Énergie');
        $category->setDescription('Super graphs sur l\'énergie');

        $subcategory = new Subcategory();
        $subcategory->setTitle('Solutions techniques');
        $subcategory->setCategory($category);

        $graph1 = new Graph();
        $graph1->setTitle('Parc régional annuel de production éolien et solaire (2001 à 2020)');
        $graph1->setIframe('<iframe src="https://opendata.reseaux-energies.fr/chart/embed/?dataChart=eyJ0aW1lc2NhbGUiOiJ5ZWFyIiwicXVlcmllcyI6W3siY2hhcnRzIjpbeyJ0eXBlIjoiY29sdW1uIiwiZnVuYyI6IlNVTSIsInlBeGlzIjoiY29uc29tbWF0aW9uX21lbnN1ZWxsZV9nd2giLCJzY2llbnRpZmljRGlzcGxheSI6dHJ1ZSwiY29sb3IiOiJyYW5nZS1BY2NlbnQifV0sInhBeGlzIjoiYW5uZWUiLCJtYXhwb2ludHMiOjUwLCJzb3J0IjoiIiwic2VyaWVzQnJlYWtkb3duIjoic2VjdGV1ciIsInN0YWNrZWQiOiJub3JtYWwiLCJjb25maWciOnsiZGF0YXNldCI6InJlcGFydGl0aW9uLWRlLWxhLWNvbnNvbW1hdGlvbi1kZS1nYXotcGFyLXNlY3RldXItZGFjdGl2aXRlIiwib3B0aW9ucyI6e319LCJ0aW1lc2NhbGUiOiJ5ZWFyIn0seyJjaGFydHMiOlt7InR5cGUiOiJjb2x1bW4iLCJmdW5jIjoiU1VNIiwieUF4aXMiOiJwYXJjX2luc3RhbGxlX2VvbGllbiIsImNvbG9yIjoiIzY2YzJhNSIsInNjaWVudGlmaWNEaXNwbGF5Ijp0cnVlfSx7ImFsaWduTW9udGgiOnRydWUsInR5cGUiOiJjb2x1bW4iLCJmdW5jIjoiU1VNIiwieUF4aXMiOiJwYXJjX2luc3RhbGxlX3NvbGFpcmUiLCJzY2llbnRpZmljRGlzcGxheSI6dHJ1ZSwiY29sb3IiOiIjZmM4ZDYyIn1dLCJ4QXhpcyI6ImFubmVlIiwibWF4cG9pbnRzIjoiIiwidGltZXNjYWxlIjoieWVhciIsInNvcnQiOiIiLCJzZXJpZXNCcmVha2Rvd25UaW1lc2NhbGUiOiIiLCJjb25maWciOnsiZGF0YXNldCI6InBhcmMtcmVnaW9uYWwtYW5udWVsLXByb2QtZW9saWVuLXNvbGFpcmUiLCJvcHRpb25zIjp7fX19XSwiYWxpZ25Nb250aCI6dHJ1ZSwiZGlzcGxheUxlZ2VuZCI6dHJ1ZX0%3D&static=false&datasetcard=false" width="400" height="300" frameborder="0"></iframe>');
        $graph1->setSubcategory($subcategory);

        $manager->persist($category);
        $manager->persist($subcategory);
        $manager->persist($graph1);
        $manager->flush();
    }
}

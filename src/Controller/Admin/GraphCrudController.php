<?php

namespace App\Controller\Admin;

use App\Entity\Graph;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class GraphCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Graph::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            AssociationField::new('subcategory', 'Sous catégorie'),
            TextField::new('iframe')->hideOnIndex(),
            TextEditorField::new('description'),
        ];
    }
}

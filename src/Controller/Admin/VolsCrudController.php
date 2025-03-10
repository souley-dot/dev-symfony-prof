<?php

namespace App\Controller\Admin;

use App\Entity\Vols;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class VolsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Vols::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('numVol'),
            AssociationField::new('villeDepart'),
            DateField::new('horaireDepart')->setFormat('dd/MM/yyyy'),
            AssociationField::new('villeArrivee'),
            DateField::new('horaireArrivee')->setFormat('dd/MM/yyyy'),
            IntegerField::new('Places'),
            IntegerField::new('Prix'),
            BooleanField::new('reduction')->setLabel('Réduction'),
        ];
    }
    
}

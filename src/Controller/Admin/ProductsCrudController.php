<?php

namespace App\Controller\Admin;

use App\Entity\Products;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;

class ProductsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Products::class;
    }


    public function configureFields(string $pageName): iterable
    {
        $fields = [
            ImageField::new('image', 'Image')
            ->setBasePath('uplaods/')
            ->setUploadDir('public/uploads')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setRequired(true),
        ];

        $slug = SlugField::new('slug')->setTargetFieldName('name');

        $name = TextField::new('name', 'Title')
        ->setFormTypeOptions([
            'attr' => [
                'maxlength' => 255
            ]
        ]);

        $description = TextEditorField::new('description', 'Description');

        $link = TextField::new('link', 'Link');
        $offerprice = MoneyField::new('offerprice', 'Offer price')->setCurrency('EUR');
        $originalprice = MoneyField::new('originalprice', 'Original price')->setCurrency('EUR');
        $series = TextField::new('series', 'Series');
        $state = TextField::new('state', 'State');
        $uploaddate = DateTimeField::new('ulpoaddate', 'Upload date');
        $type = TextField::new('type', 'Type');
        $author = TextField::new('author', 'Author');
        $editor = TextField::new('editor', 'Editor');
        $volumes = IntegerField::new('volumes', 'Volumes');


        

        $fields[] = $name; 
        $fields[] = $slug;
        $fields[] = $description; 
        $fields[] = $link; 
        $fields[] = $offerprice;
        $fields[] = $originalprice; 
        $fields[] = $series; 
        $fields[] = $state;
        $fields[] = $uploaddate; 
        $fields[] = $type; 
        $fields[] = $author;
        $fields[] = $editor; 
        $fields[] = $volumes; 

        return $fields;
    }

}

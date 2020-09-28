<?php

namespace App\Form;

use App\Entity\Ad;
use App\Form\ImageType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class AdType extends AbstractType
{
    /**
     * Permet d'avoir la configuration de base d'un champ
     *
     * @param string $label
     * @param string $placeholder
     * @param array $options
     * @return array
     */
    private function getConfiguration($label, $placeholder, $options = [])
    {
        return array_merge([
            'label' => $label,
            'attr' => [
                'placeholder' => $placeholder
            ]
        ], $options);
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, $this->getConfiguration("Titre", "Tapez un titre pour votre annonce"))
            ->add('slug', TextType::class, $this->getConfiguration("Adresse web", "Tapez l'adresse web (automatique)",[
                'required' => false
            ]))
            ->add('price', MoneyType::class, $this->getConfiguration("Prix par nuit", "indiquer le prix que vous voulez pour une nuit"))
            ->add('introduction', TextType::class, $this->getConfiguration("Introduction", "Donnez une description globale de l'annonce"))
            ->add('Content', TextAreaType::class, $this->getConfiguration("Description détaillée", "Tapez une description qui donne envie de venir chez vous"))
            ->add('CoverImage', UrlType::class, $this->getConfiguration("Url de l'image principale", "Donnez l'adresse d'une image qui donne envie"))
            ->add('rooms', IntegerType::class, $this->getConfiguration("Nombre de chambres", "Le nombre de chambres disponibles"))
            ->add('images', CollectionType::class, [
                'entry_type' => ImageType::class,
                'allow_add' => true,
                'allow_delete' => true
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ad::class,
        ]);
    }
}

<?php
namespace Pulsestorm\TutorialInstanceObjects\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pulsestorm\TutorialInstanceObjects\Model\ExampleFactory;
use \Magento\Framework\ObjectManagerInterface;
use Magento\Catalog\Model;

class Testbed extends Command
{
     protected $exampleFactory;
     protected $_productFactory;
     protected $simple_product;
     public function __construct(
         ExampleFactory $example, 
         \Magento\Catalog\Model\ProductFactory $productFactory)
     {
         //$this->exampleFactory = $example;
         echo ("Constructor er blevet kaldt !!!");
         $this->_productFactory = $productFactory;
         //$example->test();
       
         //$this->exampleFactory->test();
//         $this->manager = $manager;
         return parent::__construct();
     }
    /*
     protected $manager;            
     public function __construct(ObjectManagerInterface $manager)
     {
         $this->exampleFactory = $example;
         $this->manager = $manager;
         return parent::__construct();
     }
    
     protected $pageFactory;
     public function __construct(\Magento\Cms\Model\PageFactory $pageFactory )
     {
         $this->pageFactory = $pageFactory;
         parent::__construct();
     }
    */
     protected function configure()
     {
         $this->setName("ps:tutorial-instance-objects");
         $this->setDescription("A command the programmer was too lazy to enter a description for.");
         parent::configure();
     }
 
     protected function execute(InputInterface $input, OutputInterface $output)
     {
         $output->writeln("You've installed Pulsestorm_TutorialInstanceObjects");
         /*
         $page = $this->pageFactory->create();
         foreach($page->getCollection() as $item)
         {
            $output->writeln($item->getId() . '::' . $item->getTitle());
         }
                
         $page = $this->pageFactory->create()->load(1);        
         var_dump($page->getData());
           */
         //simple product
//         $simple_product = $this->_objectManager->create('\Magento\Catalog\Model\Product');
         $simple_product = $this->_productFactory->create();
         $simple_product->setSku('test-simple');
         $simple_product->setName('test name simple');
         $simple_product->setAttributeSetId(4);
         $simple_product->setSize_general(193); // value id of S size
         $simple_product->setStatus(1);
         $simple_product->setTypeId('simple');
         $simple_product->setPrice(10);
         $simple_product->setWebsiteIds(array(1));
         $simple_product->setCategoryIds(array(31));
         $simple_product->setStockData(array(
                 'use_config_manage_stock' => 0, //'Use config settings' checkbox
                 'manage_stock' => 1, //manage stock
                 'min_sale_qty' => 1, //Minimum Qty Allowed in Shopping Cart
                 'max_sale_qty' => 2, //Maximum Qty Allowed in Shopping Cart
                 'is_in_stock' => 1, //Stock Availability
                 'qty' => 100 //qty
             )
         );

         $simple_product->save();
/*
         $simple_product_id = $simple_product->getId();
         echo "simple product id: ".$simple_product_id."\n";

         //configurable product
         $configurable_product = $this->_objectManager->create('\Magento\Catalog\Model\Product');
         $configurable_product->setSku('test-configurable');
         $configurable_product->setName('test name configurable');
         $configurable_product->setAttributeSetId(4);
         $configurable_product->setStatus(1);
         $configurable_product->setTypeId('configurable');
         $configurable_product->setPrice(11);
         $configurable_product->setWebsiteIds(array(1));
         $configurable_product->setCategoryIds(array(31));
         $configurable_product->setStockData(array(
                 'use_config_manage_stock' => 0, //'Use config settings' checkbox
                 'manage_stock' => 1, //manage stock
                 'is_in_stock' => 1, //Stock Availability
             )
         );

         $configurable_product->getTypeInstance()->setUsedProductAttributeIds(array(152),$configurable_product); //attribute ID of attribute 'size_general' in my store
         $configurableAttributesData = $configurable_product->getTypeInstance()->getConfigurableAttributesAsArray($configurable_product);

         $configurable_product->setCanSaveConfigurableAttributes(true);
         $configurable_product->setConfigurableAttributesData($configurableAttributesData);

         $configurableProductsData = array();
         $configurableProductsData[$simple_product_id] = array( //[$simple_product_id] = id of a simple product associated with this configurable
             '0' => array(
                 'label' => 'S', //attribute label
                 'attribute_id' => '152', //attribute ID of attribute 'size_general' in my store
                 'value_index' => '193', //value of 'S' index of the attribute 'size_general'
                 'is_percent'    => 0,
                 'pricing_value' => '10',
             )
         );
         $configurable_product->setConfigurableProductsData($configurableProductsData);

         $configurable_product->save();
*/
//         echo "configurable product id: ".$configurable_product->getId()."\n";

         /*
         $product = $this->_productFactory->create();
         $product->load(1);
         $this->_productFactory->
         echo $product->getName();
         echo $product->getTitle();
         $product->setFinalPrice(9999);
         $product->setWeight(100);
         $product->setData(['Weight' => 50]);
         $product->save();
         */
                 /*
         $this->exampleFactory->test();
         $example = $this->exampleFactory->create();
         $output->writeln(
            "You just used a"                . "\n\n    " .
            get_class($this->exampleFactory) . "\n\n"     . 
            "to create a \n\n    "           . 
            get_class($example)              . "\n"); 
         $example->test();
         $this->exampleFactory->test();
         */
        /*
         $object = 
             $this->manager->create('Pulsestorm\TutorialInstanceObjects\Model\Example');
         $object = 
             $this->manager->get('Pulsestorm\TutorialInstanceObjects\Model\Example');
             */
     }
 } 
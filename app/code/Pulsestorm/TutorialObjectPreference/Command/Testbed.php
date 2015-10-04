<?php
namespace Pulsestorm\TutorialObjectPreference\Command;

use Magento\Framework\ObjectManagerInterface;
use Pulsestorm\TutorialObjectPreference\Model\Messenger;
use Magento\Catalog\Api\CategoryRepositoryInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Testbed extends Command
{
    protected $object_manager;
    protected $messenger;
       /**
     * Catalog product
     *
     * @var \Magento\Catalog\Helper\Product
     */
     
/**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry;     
    protected $categoryRepository;
    public function __construct(Messenger $messenger, ObjectManagerInterface $om, 
        \Magento\Catalog\Helper\Product $catalogProduct,
         CategoryRepositoryInterface $categoryRepository,
         \Magento\Framework\Registry $coreRegistry)
    {
        $this->object_manager = $om;
        $this->messenger      = $messenger;
        $this->_catalogProduct = $catalogProduct;
        $this->categoryRepository = $categoryRepository;
        $this->_coreRegistry = $coreRegistry;
        return parent::__construct();
    }
    
    protected function configure()
    {
        $this->setName("ps:tutorial-object-preference");
        $this->setDescription("A command the programmer was too lazy to enter a description for.");
        parent::configure();
    }
    public function getProduct()
    {
        return $this->_coreRegistry->registry('current_product');
    }
    /**
     * Return current category object
     *
     * @return \Magento\Catalog\Model\Category|null
     */
    public function getCategory()
    {
        return $this->_coreRegistry->registry('current_category');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln(
            $this->messenger->getMessage()
        );  
       try {
         if ($this->getProduct()) {
            return true;
        }
        $categoryId = 1;
        if ($categoryId != $this->getCategory()->getId()) {
            return true;
        }
          //  $categoryId = 1;
           // $category = $this->categoryRepository->get(1, $this->_storeManager->getStore()->getId());
        } catch (NoSuchEntityException $e) {
            return false;
        }
   }
} 
<?php
// src/Controller/OrderController.php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Category;
use App\Entity\Product;

use App\Entity\Order;
use App\Entity\Orderproduct;



#[IsGranted('ROLE_USER')]
class OrderController extends AbstractController{
  #[Route('/categories', name: 'categories')]

  public function categories(EntityManagerInterface $entityManager){
    $cats = $entityManager->getRepository(Category::class)->findAll();
    return $this->render('categories.html.twig', array('categories'=>$cats));
  }
  #[Route('/products/{codCat}', name: 'products')]
  public function products(EntityManagerInterface $entityManager,  $codCat){
    $cat = $entityManager->find(Category::class, $codCat);
    return $this->render('products.html.twig', array('cat'=>$cat));

  }
  #[Route('/cart', name: 'cart')]
  public function cart(EntityManagerInterface $entityManager, Request $request){    
      $session = $request->getSession();
      // check if the cart var exits
      if(!$session->has('cart')){
        $session->set('cart', array());
      }
      $cart = $session->get('cart');
      $cad="";
      $products = [];      
      /* for eache element in the cart */
      foreach($cart as $code=>$units){
        /* look for the product data in the database using the code*/ 
        $product = $entityManager->find(Product::class, (int)$code);
        /* cast to array */
        $elem =  $product->convertToArray();
        /* add a key to the array with the units */
        $elem['units'] = $units;
        /* add element to the list */
        $products[] = $elem;
      }      
      
      return $this->render('cart_order.html.twig', ['newOrder' => null, 'products' => $products]);
  }
  #[Route('/processOrder', name: 'processOrder')]
  public function processOrder(EntityManagerInterface $entityManager, Request $request){
    $errorInserting = false;
    $session = $request->getSession();
		// check if the cart var exits
		if(!$session->has('cart')){
			return $this->redirectToRoute("categories");
		}
		$cart = $session->get('cart');
    try{
      $entityManager->beginTransaction();
      $newOrder = new Order();		

      $newOrder->setDate(new \DateTime());
      $newOrder->setSent(0);
      $newOrder->setRestaurant($this->getUser());
      $entityManager->persist($newOrder);


      /* create each row of orderproduct*/
      foreach($cart as $code=>$units){
        $newRow = new Orderproduct();
        $product = $entityManager->find(Product::class, (int)$code);
        $newRow->setProduct($product);
        $newRow->setOrder($newOrder);
        $newRow->setUnits($units);
        // reduce product stock
        $product->setStock($product->getStock()-$units);
        $entityManager->persist($newRow);	
      }		
      /* save order */
      $entityManager->flush();
      $entityManager->commit();
      /* clear cart */
      $session->set('cart', array());
      /* send email */

    }catch(\Exception $e){
      $entityManager->rollback();
      $errorInserting = $e->getMessage();
    }
 
		
		
    return $this->render('processOrder.html.twig', ['errorInserting' => $errorInserting,
                                                    'newOrder' => $newOrder]);

  }
  #[Route('/add', name: 'add', methods: ['POST'])]
  public function add(EntityManagerInterface $entityManager, Request $request){
    /* get the session */
    $session = $request->getSession();
    /* if the cart does not exists, we create it*/
    if (!$session->has('cart') ) {
      $session->set('cart', array());     
    }
    $cart = $session->get('cart');
    /* put the post arguments in variables */
    $cod = $request->request->get('cod');
    $units = $request->request->get('units');
    
    /* if the product is already in the cart, we add the units */ 
    if(isset($cart[$cod])){           
      $cart[$cod] += $units;
    }else{
    /* if not, we create it */ 
      $cart[$cod] = $units;		
    }
    $session->set('cart', $cart);
    return $this->redirectToRoute('cart' );

  }
  #[Route('/remove', name: 'remove', methods: ['POST'])]
  public function remove(EntityManagerInterface $entityManager,  Request $request){
    /* get the session */
    $session = $request->getSession();
    /* if the cart does not exists, we should not be here*/
    if (!$session->has('cart') ) {
      $session->set('cart', array());     
      return $this->redirectToRoute('cart' );           
    }
    $cart = $session->get('cart');
    /* put the post arguments in variables */
    $cod = $request->request->get('cod');
    $units = $request->request->get('units');
    
    /* if the product is already in the cart, we substract the units */ 
    if(isset($cart[$cod])){           
      $cart[$cod] -= $units;
      /* if the number of units becomes <= 0, we remove the key */ 
      if($cart[$cod] <=  0) {
        unset($cart[$cod]);
      }
    }
    $session->set('cart', $cart);
    return $this->redirectToRoute('cart' );

  }




}
     



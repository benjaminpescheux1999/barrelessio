<?php
include('controller/Panier.php');
class Seconnecter extends Controller
{
    public $panier;
    function index(){
        $variable["test"]=array('titre'=>'Accueil', 'description'=>'trop de blabla');
        $this-> set($variable);
        $this->render('index');
    }
    
    function connect($personne=null){
        $login=null;
        $mdp=null;
        
        if(isset($_POST['login']) && isset($_POST['mdp'])){
            $login=$_POST['login'];
            $mdp=$_POST['mdp'];
        }
 
        if($personne!=null && isset($_SESSION['auteurtmp'])){
            $login= $_SESSION['auteurtmp']['login'];
            $mdp=$_SESSION['auteurtmp']['mdp'];
           // unset( $_SESSION['auteurtmp']);
        }
        
        $tables = Model::load("auteur");        
        $tableRes['variable']=
        array("auteur"=>$tables->find(Model::connexion(), 
            array('condition'=>"pseudo_auteur='".$login."' and mdp_auteur='".md5($mdp)."'")));
        Model::deconnexion();
       
        
        if(count($tableRes['variable']['auteur']) ==1 || isset($_SESSION['auteur'])){
            $_SESSION['auteur']=$tableRes['variable']['auteur'];
            //var_dump($_SESSION['auteur']);
            $this->render('connexion');
        }else{
            $this->render('inscription');
        }
        
        //$this-> set($tableRes);
        
    }
    
    function deconnect(){
        unset($_SESSION['auteur']);
        header('Location:'.WEBROOT.'seconnecter'); 
    }
    function commander(){
        
    }
    
    function commanderfinaliser(){
        
        
    }
    
    function inscription(){
       
    }
    
    function modifier(){
        $this->render('connexion');
    }
    
    function ajouterblague(){
        
    }
    
    function ajouterCB(){
        
    }
    
    function modifierCB($i){
        
    }
    function facture(){
        
    }
}
?>

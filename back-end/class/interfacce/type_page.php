<?php 
interface type_page{

	public function intestazione();
    public function header();
	public function menu();	
    public function breadcrumb();
    public function print_bar();
    public function footer();
    public function body();
	public function head();
}
?>

class Thing {
	
	public String name;
	public static String surname;
	
}
public class Static {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		Thing thing1 = new Thing();
		thing1.name = "Anna";
		Thing.surname = "Cilona";
		
		System.out.println("Hello " + thing1.name + " " + Thing.surname);
	}

}

package interfaceLecture;

public class App {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		Machine machine1 = new Machine();
		Person person1 = new Person("Anna");
		
		machine1.start();
		machine1.showInfo();
				
		person1.greetings();
		
		/**
		 * You can use the Info class
		 */
		Info info1 = new Person("Camilla");
		info1.showInfo();
		
		
	}

}

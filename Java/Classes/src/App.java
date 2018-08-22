// A class is a blueprint to create objects. In a java project almost everything is an obj.
/*
 * A class can contain:
 * 1. Data
 * 2. Subroutines (methods)
 */
class Person {

	// Instance variable are data or "state"
	private String name;
	public Person(String name, int age) {
		this.name = name;
	}

	public void setName(String name) {
		this.name = name;
	}

	public String getName() {
		return this.name;
	}

}

public class App {

	public static void main(String[] args) {
		// TODO Auto-generated method stub

		Machine machine1 = new Machine();
		
		machine1.start();
		machine1.stop();
		
		Car car1 = new Car();
		car1.start();
		car1.wipeWindShield();
		car1.stop();
	}

}

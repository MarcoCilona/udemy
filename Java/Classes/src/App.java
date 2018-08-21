// A class is a blueprint to create objects. In a java project almost everything is an obj.
/*
 * A class can contain:
 * 1. Data
 * 2. Subroutines (methods)
 */
class Person {

	// Instance variable are data or "state"
	private String name;
	private int age;
	
	public Person(String name, int age) {
		this.name = name;
		this.age = age;
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

		// Using Person class to create an obj
		Person firstPerson = new Person("Camilla", 5);
		
		System.out.println("Hello " + firstPerson.getName());

	}

}

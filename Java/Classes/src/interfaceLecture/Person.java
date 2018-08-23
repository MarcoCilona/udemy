package interfaceLecture;

public class Person implements Info{

	private String name;
	
	public Person(String name) {
		super();
		this.name = name;
	}

	public void greetings() {
		System.out.println("Hello there!");
	}

	@Override
	public void showInfo() {
		// TODO Auto-generated method stub
		System.out.println("Person name is: " + name);
	}
}

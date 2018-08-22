
public class Dog {

	private String name;
	private String owner;
	private int age;
		
	public Dog(String name, String owner, int age) {
		super();
		this.name = name;
		this.owner = owner;
		this.age = age;
	}

	public String getName() {
		return name;
	}

	public void setName(String name) {
		this.name = name;
	}

	public String getOwner() {
		return owner;
	}

	public void setOwner(String owner) {
		this.owner = owner;
	}

	public int getAge() {
		return age;
	}

	public void setAge(int age) {
		this.age = age;
	}
	
	public void printInfo() {
		System.out.println(name + " has " + age + " years and its owner is " + owner);
	}

}

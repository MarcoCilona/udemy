package polymorphism;

public class Tree extends Plant {
	
	@Override
	public void grow() {
		System.out.println("Tree is growing!");
	}
	
	public void shredLeaves() {
		System.out.println("Leave shreding");
	}
}

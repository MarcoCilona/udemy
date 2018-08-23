package generic;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;

public class App {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		
		ArrayList<String> list = new ArrayList<>();
		
		list.add("Anna");
		list.add("Camilla");
		
		System.out.println(list.get(1));
		
		//// There can be more than one type ////
		HashMap<String, String> map = new HashMap<String, String>();

		map.put("zia", "Anna");
		map.put("nonna", "Chiara");
		
		for(Map.Entry<String, String> entry : map.entrySet()) {
			System.out.println("La " + entry.getKey() + " di Camilla è " + entry.getValue());
		}
		
		Person p1 = new Person("Anna", "Bestetti", 24);
		Person p2 = new Person("Anna", "Bestetti", 24);
		System.out.println(p1.hashCode());
		System.out.println(p2.equals(p1));
		
				
		
	}

}

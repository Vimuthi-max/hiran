ca1 .....>>




import java.util.Scanner;

 class Student{
	private int id;
	private String name;
	private String course;
	private int marks;
	
	static String collegeName="National College";
	
	Student(int id,String name,String course,int marks){
		this.id=id;
		this.name=name;
		this.course=course;
		this.marks=marks;
	}
	
	public void setId(int id){
		this.id=id;
	}
	public int getId(){
		return id;
	}
	
	public void setName(String name){
		this.name=name;
	}
	public String getName(){
		return name;
	}
	
	public void setCourse(String course){
		this.course=course;
	}
	public String getCourse(){
		return course;
	}
	
	public void setMarks(int marks){
		this.marks=marks;
	}
	public int getMarks(){
		return marks;
	}
	
	
	
	
	public void displayStudentInfo(){
		System.out.println("id : "+getId());
		System.out.println("name : "+getName());
		System.out.println("course : "+getCourse());
		System.out.println("marks : "+getMarks());
		System.out.println("collegeName :"+collegeName);
		System.out.println(".....................");
		System.out.println(" ");
	}
}

public class example2{
	public static void main(String [] args){
		
		Scanner sc=new Scanner(System.in);
		
		int n;
		System.out.print("Enter the number of student: ");
		 n=sc.nextInt();
		
		Student[] arrays1=new Student[n];
		
		for(int i=0; i<n;i++){
			
		System.out.print("Enter the id : ");
		int id=sc.nextInt();
		sc.nextLine();
		
		System.out.print("Enter the name : ");
		String name=sc.nextLine();
		
		System.out.print("Enter the course : ");
		String course=sc.nextLine();
		
		System.out.print("Enter the marks : ");
		int marks=sc.nextInt();
			
		sc.nextLine();
		
		arrays1[i]=new Student(id,name,course,marks);
		
		}
		
		for(int i=0;i<n;i++){
		arrays1[i].displayStudentInfo();
		}
	}
}





						 .............................................................................................................................
		Bill System			




						 import java.util.Scanner;

// 1. Customer Class
class Customer {
    private final int customerid; // final නිසා read-only වෙනවා
    private String name;
    private String address;

    Customer(int customerid, String name, String address) {
        this.customerid = customerid;
        setName(name); // parameter එක pass කරන්න ඕනේ
        this.address = address;
    }

    public void setName(String name) {
        if (name == null || name.isEmpty()) { // spelling: isEmpty
            System.out.println("Name can't be empty");
            this.name = "Unknown";
        } else {
            this.name = name;
        }
    }

    public int getCustomerid() { return customerid; }
    public String getName() { return name; }
    public String getAddress() { return address; }
}

// 2. Abstract Class
abstract class UtilityAccount {
    Customer customer; 
    double units;
    double bill;

    UtilityAccount(Customer customer, double units) {
        this.customer = customer;
        setUnits(units);
    }

    public void setUnits(double units) {
        if (units < 0) {
            System.out.println("Use positive units number");
            this.units = 0;
        } else {
            this.units = units;
        }
    }

    abstract void calculateBill();
    abstract void generateBill();
}

// 3. Electricity Account
class ElectricityAccount extends UtilityAccount {
    ElectricityAccount(Customer customer, double units) {
        super(customer, units);
    }

    @Override
    void calculateBill() {
        bill = units * 6;
        if (units > 300) {
            bill = bill + (bill * 0.1);
        }
    }

    @Override
    void generateBill() {
        System.out.println("--- Electricity Bill ---");
        System.out.println("User: " + customer.getName());
        System.out.println("Units: " + units);
        System.out.println("Amount: $" + bill);
        System.out.println("------------------------");
    }
}

// 4. Water Account
class WaterAccount extends UtilityAccount {
    WaterAccount(Customer customer, double units) {
        super(customer, units);
    }

    @Override
    void calculateBill() {
        bill = units * 2;
        if (units > 500) {
            bill = bill + 150; // $150 fixed charge
        }
    }

    @Override
    void generateBill() {
        System.out.println("--- Water Bill ---");
        System.out.println("User: " + customer.getName());
        System.out.println("Units: " + units);
        System.out.println("Amount: $" + bill);
        System.out.println("------------------------");
    }
}

// 5. Main Class
public class example2 {
    public static void main(String[] args) {
        // Customer කෙනෙක් හදමු
        Customer c1 = new Customer(101, "Amal", "Galle");

        // Polymorphism පාවිච්චි කරලා Array එකක් හදමු
        UtilityAccount[] accounts = new UtilityAccount[2];
        
        accounts[0] = new ElectricityAccount(c1, 350);
        accounts[1] = new WaterAccount(c1, 600);

        for (UtilityAccount acc : accounts) {
            acc.calculateBill();
            acc.generateBill();
        }
    }
}

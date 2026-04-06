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

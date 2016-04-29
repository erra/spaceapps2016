
#include <Servo.h>
int variable;
Servo myservo;  // create servo object to control a servo

int potpin = 2;  // analog pin used to connect the potentiometer
int val;    // variable to read the value from the analog pin

void setup()
{
  myservo.attach(9);  // attaches the servo on pin 9 to the servo object
  Serial.begin(9600);
  pinMode(10, INPUT);
}

void loop() 
{ 
  val = 1023 ; 
  val = map(val, 0, 1023, 0, 180);     // scale it to use it with the servo (value between 0 and 180) 
  myservo.write(val);                  // sets the servo position according to the scaled value 
  delay(15);                           // waits for the servo to get there 
 if (analogRead(potpin) >= 1001){
        Serial.print("lectura analogica= ");
        delay(2000);
	Serial.println(analogRead(A0)); //lectura analógica
        Serial.print("lectura digital= ");
	Serial.println(digitalRead(10)); //lectura digital
        variable = map(analogRead(A0),1023,0, 0,100);
        
        Serial.print(variable);
        Serial.println(" %");
        delay(500);
       
 }
} 


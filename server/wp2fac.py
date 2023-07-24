import argparse
import pywhatkit
import datetime

def main():
    parser = argparse.ArgumentParser(description="Send WhatsApp message with code.")
    parser.add_argument("--number", type=str, help="WhatsApp number to send the message.")
    parser.add_argument("--code", type=str, help="Verification code to send in the message.")
    args = parser.parse_args()

    if args.number and args.code:
        now = datetime.datetime.now()
        hour = now.hour
        minute = now.minute + 1 

        formatted_hour = str(hour).zfill(2)
        formatted_minute = str(minute).zfill(2)

        message = f"Merhaba! \nDoğrulama Kodunuz: {args.code} \nBu Mesaj 3 dakika sonra de-aktif olacaktır."

        pywhatkit.sendwhatmsg(args.number, message, int(formatted_hour), int(formatted_minute))

    else:
        print("Please provide both --number and --code arguments.")

if __name__ == "__main__":
    main()

<% 
	
sName = Request.Form("name")
sEmail = Request.Form("email")
sEnquiry = Request.Form("message")
sTelephone = Request.Form("telephone")


sSubject = sSubjects

sMessage = "The following was entered on the Promo Candy Girls Website. " & vbCrLf & "Name: " & sName & vbCrLf & vbCrLf & "Email: " & sEmail & vbCrLf & vbCrLf & "Message " & sEnquiry & vbCrLf & vbCrlf  & "Telephone: " & sTelephone 
			

	'initialise objects and variables
	Set Mail = Server.CreateObject("Persits.MailSender") 


	' This is my local SMTP server
	Mail.Host = "localhost"
	Mail.Username = "info@somarketing.com"
	Mail.Password = "trekkers"
	
	' This is me.... 
	Mail.FromName = "Promo Candy Girls Website"
	Mail.From = "enquiries@promocandygirls.co.uk"
	Mail.Subject = sSubject	
	
	' Get the recipients mailbox from a form (note the lack of a equal sign).
	Mail.AddAddress "enquiries@promocandygirls.co.uk"
	Mail.Body = sMessage
	Mail.Send
	set Mail = nothing
  %>

<meta http-equiv="refresh" content="0;URL=thankyou.html" />

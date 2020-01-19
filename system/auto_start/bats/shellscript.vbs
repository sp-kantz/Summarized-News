Set WinScriptHost = CreateObject("WScript.Shell")
WinScriptHost.Run Chr(34) & "C:\wamp\summarizer_filesystem\bats\script.bat" & Chr(34), 0
Set WinScriptHost = Nothing
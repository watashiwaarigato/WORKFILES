Public Class Form1

    Private Sub btnBrowse_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnBrowse.Click
        If (FolderBrowserDialog1.ShowDialog() = DialogResult.OK) Then
            txtDirrectory.Text = FolderBrowserDialog1.SelectedPath
            btnCheck.Enabled = True
            btnReset.Enabled = True
        End If
    End Sub

    Private Sub btnCheck_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnCheck.Click
        btnCheck.Enabled = False
        btnReset.Enabled = True
        txtCheck.Text = ""

        'FILE CHECKER
        Dim txtfile As String
        Dim ctr_txtfile As Integer
        Dim files() As String = IO.Directory.GetFiles(txtDirrectory.Text)
        Dim i As Integer
        Dim folders As String
        Dim result = System.IO.Directory.EnumerateDirectories(txtDirrectory.Text, "*", System.IO.SearchOption.AllDirectories)

        For Each file As String In files
            'Dim text As String = IO.File.ReadAllText(file)

            Dim parts As String() = file.Split(New Char() {"."c})
            Dim parts_lenght As Integer = parts.Length()
            If parts(parts_lenght - 1) = "txt" Then
                txtfile = file
                ctr_txtfile += 1
            End If
        Next

        If ctr_txtfile > 1 Then
            txtCheck.Text += "Warning: Cant find diff list file! Delivery file checker disabled." & Environment.NewLine & Environment.NewLine
        ElseIf ctr_txtfile < 1 Then
            txtCheck.Text += "Warning: Cant find diff list file! Delivery file checker disabled." & Environment.NewLine & Environment.NewLine
        Else
            Dim text As String = IO.File.ReadAllText(txtfile)

            'diff_list
            'htm
            Dim htm_split As Array
            htm_split = Split(text, ".htm")

            'html
            Dim html_split As Array
            html_split = Split(text, ".html")

            'shtml
            Dim shtml_split As Array
            shtml_split = Split(text, ".shtml")

            'css
            Dim css_split As Array
            css_split = Split(text, ".css")

            'inc
            Dim inc_split As Array
            inc_split = Split(text, ".inc")

            'gif
            Dim gif_split As Array
            gif_split = Split(text, ".gif")

            'jpg
            Dim jpg_split As Array
            jpg_split = Split(text, ".jpg")

            'png
            Dim png_split As Array
            png_split = Split(text, ".png")

            'get all files folder and subfolders
            Dim htm_total, html_total, shtml_total, css_total, inc_total, gif_total, jpg_total, png_total, thumbs_total As String
            For i = 0 To result.Count - 1
                folders = result(i)
                htm_total = htm_total + IO.Directory.GetFiles(folders, "*.htm").Length
                html_total = html_total + IO.Directory.GetFiles(folders, "*.html").Length
                shtml_total = shtml_total + IO.Directory.GetFiles(folders, "*.shtml").Length

                css_total = css_total + IO.Directory.GetFiles(folders, "*.css").Length
                inc_total = inc_total + IO.Directory.GetFiles(folders, "*.inc").Length
                gif_total = gif_total + IO.Directory.GetFiles(folders, "*.gif").Length
                jpg_total = jpg_total + IO.Directory.GetFiles(folders, "*.jpg").Length
                png_total = png_total + IO.Directory.GetFiles(folders, "*.png").Length
                thumbs_total = thumbs_total + IO.Directory.GetFiles(folders, "*.db").Length
            Next i

        End If


        'ALT CHECKER
        i = 0
        folders = ""
        Dim line_number As String
        Dim html_files() As String
        For i = 0 To result.Count - 1
            folders = result(i)
            'html
            html_files = IO.Directory.GetFiles(folders, "*.html", System.IO.SearchOption.TopDirectoryOnly)
            For Each FileName As String In html_files
                Dim toSearch = "alt="""""
                For Each Line As String In IO.File.ReadLines(FileName)
                    line_number += 1
                    If Line.Contains(toSearch) = True Then
                        Dim line_trim As String = Line.Replace("	", "")
                        txtCheck.Text += "Error: " & folders & Environment.NewLine & "No alt at line: " & line_number & " " & Environment.NewLine & line_trim & Environment.NewLine & Environment.NewLine
                    End If
                Next




            Next


        Next i

    End Sub


    Private Sub btnReset_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnReset.Click
        btnCheck.Enabled = False
        btnReset.Enabled = False
        txtDirrectory.Text = ""
        txtCheck.Text = ""
    End Sub
End Class

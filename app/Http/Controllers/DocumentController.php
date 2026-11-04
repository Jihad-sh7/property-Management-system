<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    // ✅ لا حاجة لـ $table إذا كنت لا تستخدم Eloquent مع اسم جدول مختلف

    public function addDocument(Request $request, $property_id)
    {
        $property = Property::findOrFail($property_id);

        $request->validate([
            'document_type' => 'required|string|max:255',
            'file_path' => 'required|file|max:2048', // ✅ غيرت من image إلى file
        ]);

        // ✅ حفظ الملف في مجلد public
        $path = $request->file('file_path')->store('property_documents', 'public');

        // ✅ إنشاء سجل جديد في قاعدة البيانات
        $property->Documents()->create([
            'document_type' => $request->document_type,
            'file_path' => $path,
        ]);

        return response()->json(['message' => 'Document uploaded successfully'], 201);
    }

    public function deleteDocument($document_id)
    {
        $document = Document::findOrFail($document_id);

        // ✅ حذف الملف من التخزين
        Storage::disk('public')->delete($document->file_path);

        // ✅ حذف السجل من قاعدة البيانات
        $document->delete();

        return response()->json(['message' => 'Document deleted successfully']);
    }

    public function getDocument($document_id)
    {
        $document = Document::findOrFail($document_id);
    
        if (!Storage::disk('public')->exists($document->file_path)) {
            return response()->json([
                'error' => 'Document file not found'
            ], 404);
        }
    
        // ✅ استخدام Storage::url() ليعيد المسار النسبي
        $url = Storage::url($document->file_path);
    
        return response()->json([
            'document_type' => $document->document_type,
            'url' => $url,
        ]);
    }
}